<?php

header("Content-Type: application/json");

include "../../server/connection.php";
include "../../server/mailer.php";

require '../../vendor/autoload.php';

use Dompdf\Dompdf;

// Fallback for domain if it's not defined in your include files
$domain = isset($domain) ? $domain : "http://" . $_SERVER['HTTP_HOST'] . "/";

function respond($ok, $message, $extra = [])
{
  echo json_encode(array_merge([
    "ok" => $ok,
    "message" => $message
  ], $extra));

  exit;
}

function post_val($key, $default = "")
{
  return isset($_POST[$key])
    ? trim((string)$_POST[$key])
    : $default;
}

function require_field($key, $label = null)
{
  $label = $label ?: $key;

  if (!isset($_POST[$key])) {
    respond(false, "Missing required field: {$label}");
  }

  $value = trim((string)$_POST[$key]);

  if ($value === "") {
    respond(false, "Missing required field: {$label}");
  }

  return $value;
}

function save_upload(
  $field,
  $destDirAbs,
  $destDirRel,
  $prefix,
  $allowedExt = [],
  $maxBytes = 5242880
) {

  if (!isset($_FILES[$field])) {
    return null;
  }

  $f = $_FILES[$field];

  if ($f["error"] === UPLOAD_ERR_NO_FILE) {
    return null;
  }

  if ($f["error"] !== UPLOAD_ERR_OK) {
    throw new Exception("Upload failed for {$field}");
  }

  if ($f["size"] > $maxBytes) {
    throw new Exception("File too large for {$field}");
  }

  $ext = strtolower(pathinfo($f["name"], PATHINFO_EXTENSION));

  if (!empty($allowedExt) && !in_array($ext, $allowedExt)) {
    throw new Exception("Invalid file type for {$field}");
  }

  if (!is_dir($destDirAbs)) {
    mkdir($destDirAbs, 0777, true);
  }

  $filename = $prefix . "_" . time() . "_" . rand(1000, 9999) . "." . $ext;

  $targetAbs = $destDirAbs . "/" . $filename;

  if (!move_uploaded_file($f["tmp_name"], $targetAbs)) {
    throw new Exception("Failed saving {$field}");
  }

  return $destDirRel . "/" . $filename;
}


/* =========================================================
   BASIC INPUTS
========================================================= */

$visa_type        = require_field("visa_type");
$selected_country = require_field("selected_country");
$entry_source     = post_val("entry_source");

$allowed_types = [
  "business",
  "immigration",
  "travel",
  "family",
  "student",
  "processing",
  "vacation"
];

if (!in_array($visa_type, $allowed_types)) {
  respond(false, "Invalid visa type");
}


/* =========================================================
   COMMON FIELDS
========================================================= */

$first_name                = require_field("first_name");
$middle_name               = post_val("middle_name");
$last_name                 = require_field("last_name");

$gender                    = require_field("gender");
$date_of_birth             = require_field("date_of_birth");

$birth_city                = require_field("birth_city");
$birth_country             = require_field("birth_country");

$nationality               = require_field("nationality");
$current_residence_country = require_field("current_residence_country");

$marital_status            = require_field("marital_status");

$national_id_number        = post_val("national_id_number");

$passport_type             = require_field("passport_type");
$passport_number           = require_field("passport_number");

$issuing_country           = require_field("issuing_country");
$issuing_authority         = require_field("issuing_authority");

$date_of_issue             = require_field("date_of_issue");
$expiry_date               = require_field("expiry_date");

$previous_passport_number  = post_val("previous_passport_number");

$has_another               = (int) require_field("has_another_valid_passport");

$residential_address       = require_field("residential_address");

$city                      = require_field("city");
$state_province            = require_field("state_province");

$postal_code               = require_field("postal_code");

$country                   = require_field("country");

$mobile_phone              = require_field("mobile_phone");
$alt_phone                 = post_val("alt_phone");

$email                     = require_field("email");


/* =========================================================
   VISA TYPE TABLES
========================================================= */

switch ($visa_type) {

  case "business":
    $table_name = "business_visa_applications";
    $application_ref = "BUS" . date("YmdHis") . rand(100, 999);
    break;

  case "student":
    $table_name = "student_visa_applications";
    $application_ref = "STU" . date("YmdHis") . rand(100, 999);
    break;

  case "family":
    $table_name = "family_visa_applications";
    $application_ref = "FAM" . date("YmdHis") . rand(100, 999);
    break;

  case "travel":
    $table_name = "travel_visa_applications";
    $application_ref = "TRV" . date("YmdHis") . rand(100, 999);
    break;

  case "immigration":
    $table_name = "immigration_visa_applications";
    $application_ref = "IMM" . date("YmdHis") . rand(100, 999);
    break;

  case "processing":
    $table_name = "travel_visa_applications";
    $application_ref = "PRO" . date("YmdHis") . rand(100, 999);
    break;

  case "vacation":
    $table_name = "vacation_visa_applications";
    $application_ref = "VAC" . date("YmdHis") . rand(100, 999);
    break;

  default:
    respond(false, "Unsupported visa type");
}


/* =========================================================
   INSERT APPLICATION
========================================================= */

$sql = "INSERT INTO $table_name (
    application_ref,
    entry_source,
    current_step,
    status,
    first_name,
    middle_name,
    last_name,
    gender,
    date_of_birth,
    birth_city,
    birth_country,
    nationality,
    current_residence_country,
    marital_status,
    national_id_number,
    passport_type,
    passport_number,
    issuing_country,
    issuing_authority,
    date_of_issue,
    expiry_date,
    previous_passport_number,
    has_another_valid_passport,
    residential_address,
    city,
    state_province,
    postal_code,
    country,
    mobile_phone,
    alt_phone,
    email,
    destination_country
) VALUES (
    ?, ?, 1, 'submitted',
    ?, ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?, ?,
    ?,
    ?, ?, ?, ?,
    ?, ?,
    ?, ?
)";

$stmt = mysqli_prepare($connection, $sql);

if (!$stmt) {
    respond(false, "Failed preparing statement: " . mysqli_error($connection));
}

// Exactly 31 types passed ("s" x 30 and "i" x 1)
// Exactly 30 type definitions: 29 strings ("s") and 1 integer ("i")
mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssssssssssisssssssss", // Count: 20 's', 1 'i', 9 's' = 30 total
    $application_ref,           // 1  (s)
    $entry_source,              // 2  (s)
    $first_name,                // 3  (s)
    $middle_name,               // 4  (s)
    $last_name,                 // 5  (s)
    $gender,                    // 6  (s)
    $date_of_birth,             // 7  (s)
    $birth_city,                // 8  (s)
    $birth_country,             // 9  (s)
    $nationality,               // 10 (s)
    $current_residence_country, // 11 (s)
    $marital_status,            // 12 (s)
    $national_id_number,        // 13 (s)
    $passport_type,             // 14 (s)
    $passport_number,           // 15 (s)
    $issuing_country,           // 16 (s)
    $issuing_authority,         // 17 (s)
    $date_of_issue,             // 18 (s)
    $expiry_date,               // 19 (s)
    $previous_passport_number,  // 20 (s)
    $has_another,               // 21 (i) <- This is the integer
    $residential_address,       // 22 (s)
    $city,                      // 23 (s)
    $state_province,            // 24 (s)
    $postal_code,               // 25 (s)
    $country,                   // 26 (s)
    $mobile_phone,              // 27 (s)
    $alt_phone,                 // 28 (s)
    $email,                     // 29 (s)
    $selected_country           // 30 (s)
);

// FIX: Run it ONCE and move on to uploads if true
if (!mysqli_stmt_execute($stmt)) {
    respond(false, "Failed saving application", [
        "error" => mysqli_stmt_error($stmt)
    ]);
}

$app_id = mysqli_insert_id($connection);
mysqli_stmt_close($stmt);


/* =========================================================
   FILE UPLOADS
========================================================= */

try {

  $projectRoot = realpath(__DIR__ . "/../../");
  $uploadsRel = "uploads/visa_applications/" . $app_id;
  $uploadsAbs = $projectRoot . "/" . $uploadsRel;

  $passport_biodata = save_upload(
    "passport_biodata",
    $uploadsAbs,
    $uploadsRel,
    "passport_biodata",
    ["jpg", "jpeg", "png", "pdf", "webp"],
    8 * 1024 * 1024
  );

  if (!$passport_biodata) {
    throw new Exception("Passport biodata required");
  }

  $passport_photo = save_upload(
    "passport_photo",
    $uploadsAbs,
    $uploadsRel,
    "passport_photo",
    ["jpg", "jpeg", "png", "webp"],
    5 * 1024 * 1024
  );

  $update_sql = "UPDATE $table_name
    SET
        doc_passport_biodata = ?,
        doc_passport_photo = ?
    WHERE id = ?";

  $update_stmt = mysqli_prepare($connection, $update_sql);

  mysqli_stmt_bind_param(
    $update_stmt,
    "ssi",
    $passport_biodata,
    $passport_photo,
    $app_id
  );

  mysqli_stmt_execute($update_stmt);
  mysqli_stmt_close($update_stmt);

} catch (Exception $e) {
  // Graceful failure strategy handled cleanly
  respond(true, "Application saved but upload error", [
    "warning" => $e->getMessage(),
    "application_ref" => $application_ref
  ]);
}


/* =========================================================
   GENERATE TRACK LINK
========================================================= */

/* =========================================================
   EMAIL TEMPLATE
========================================================= */

/* --------- SEND CONFIRMATION EMAIL --------- */

$track_link = $domain . "/track/?ref=" . urlencode($application_ref);

$email_subject = "Visa Application Submitted - Ref: " . $application_ref;

$email_body = "
<h2 style='margin-bottom:20px;'>Visa Application Confirmation</h2>

<p>Dear {$first_name} {$last_name},</p>

<p>Your visa application has been successfully submitted. Below are your details:</p>

<hr>

<h3>Personal Information</h3>
<p><strong>Application Reference:</strong><br>{$application_ref}</p>
<p><strong>Visa Type:</strong><br>" . ucfirst($visa_type) . "</p>
<p><strong>Destination Country:</strong><br>{$selected_country}</p>

<p><strong>Full Name:</strong><br>{$first_name} {$middle_name} {$last_name}</p>
<p><strong>Gender:</strong><br>{$gender}</p>
<p><strong>Date of Birth:</strong><br>{$date_of_birth}</p>
<p><strong>Birth City:</strong><br>{$birth_city}</p>
<p><strong>Birth Country:</strong><br>{$birth_country}</p>
<p><strong>Nationality:</strong><br>{$nationality}</p>
<p><strong>Marital Status:</strong><br>{$marital_status}</p>

<hr>

<h3>Passport Information</h3>
<p><strong>Passport Type:</strong><br>{$passport_type}</p>
<p><strong>Passport Number:</strong><br>{$passport_number}</p>
<p><strong>Issuing Country:</strong><br>{$issuing_country}</p>
<p><strong>Issuing Authority:</strong><br>{$issuing_authority}</p>
<p><strong>Date of Issue:</strong><br>{$date_of_issue}</p>
<p><strong>Expiry Date:</strong><br>{$expiry_date}</p>

<hr>

<h3>Contact Information</h3>
<p><strong>Residential Address:</strong><br>{$residential_address}</p>
<p><strong>City:</strong><br>{$city}</p>
<p><strong>State/Province:</strong><br>{$state_province}</p>
<p><strong>Postal Code:</strong><br>{$postal_code}</p>
<p><strong>Country:</strong><br>{$country}</p>
<p><strong>Mobile Phone:</strong><br>{$mobile_phone}</p>
<p><strong>Email:</strong><br>{$email}</p>

<hr>

<h3>Track Your Application</h3>
<p>You can track your application status using the link below:</p>

<p>
<a href='{$track_link}' style='
    display:inline-block;
    padding:10px 20px;
    background:#007bff;
    color:#fff;
    text-decoration:none;
    border-radius:5px;
'>
Track Application
</a>
</p>

<p>Or copy and paste this link into your browser:<br>
{$track_link}</p>

<br>
<p>Thank you.</p>
";

// SEND EMAIL
$mail_sent = smtpmailer($email, $email_subject, $email_body);


/* =========================================================
   GENERATE PDF RECEIPT
========================================================= */


$dompdf = new Dompdf();
$dompdf->loadHtml($email_body);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();

$receipt_dir = "../../uploads/receipts";

if (!is_dir($receipt_dir)) {
  mkdir($receipt_dir, 0777, true);
}

$receipt_filename = "receipt_" . $application_ref . ".pdf";
$receipt_path = $receipt_dir . "/" . $receipt_filename;

file_put_contents($receipt_path, $dompdf->output());

$receipt_url = $domain . "/uploads/receipts/" . $receipt_filename;


/* =========================================================
   TIMELINE
========================================================= */

$submitted_date = date("Y-m-d H:i:s"); // now
$under_review_date = date("Y-m-d H:i:s", strtotime("+72 hours"));

$timeline_events = [
    [
        "title" => "Application Submitted",
        "text" => "Your application has been submitted successfully and is awaiting assignment to an agent for review.",
        "icon"  => "bi bi-send-fill",
        "event_date" => $submitted_date,
        "is_payment" => 0
    ],
    [
        "title" => "Under Review",
        "text"  => "Our team is currently reviewing your details and documents. Status: SUBMITTED",
        "icon"  => "bi bi-search",
        "event_date" => $under_review_date,
        "is_payment" => 0
    ],
    [
        "title" => "Payment Required",
        "text"  => "To continue processing your application, please complete your payment.",
        "icon"  => "bi bi-credit-card-2-front-fill",
        "event_date" => null,
        "is_payment" => 1
    ],
    [
        "title" => "Next Updates",
        "text"  => "Once payment is confirmed, we will continue processing and notify you of the next steps.",
        "icon"  => "bi bi-check-circle-fill",
        "event_date" => null,
        "is_payment" => 0
    ],
    [
        "title" => "Visa Approved",
        "text"  => "Your visa application has been approved.",
        "icon"  => "bi bi-check-circle-fill",
        "event_date" => null,
        "is_payment" => 0
    ]
];

foreach ($timeline_events as $event) {

    $timeline_sql = "INSERT INTO visa_application_timeline 
        (application_ref, visa_type, title, description, icon, event_date, is_payment)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $timeline_stmt = mysqli_prepare($connection, $timeline_sql);

    if ($timeline_stmt) {

        mysqli_stmt_bind_param(
            $timeline_stmt,
            "ssssssi",
            $application_ref,
            $visa_type,
            $event["title"],
            $event["text"],
            $event["icon"],
            $event["event_date"],
            $event["is_payment"]
        );

        mysqli_stmt_execute($timeline_stmt);
        mysqli_stmt_close($timeline_stmt);
    };
};


/* =========================================================
   FINAL RESPONSE
========================================================= */

respond(true, "Application submitted successfully", [
  "application_id" => $app_id,
  "application_ref" => $application_ref,
  "visa_type" => $visa_type,
  "mail_sent" => $mail_sent ? true : false,
  "receipt_url" => $receipt_url,
  "track_link" => $track_link
]);