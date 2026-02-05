<?php
header("Content-Type: application/json");
include "../../server/connection.php";

function respond($ok, $message, $extra = [])
{
  echo json_encode(array_merge(["ok" => $ok, "message" => $message], $extra));
  exit;
}

/**
 * Return POST value (trimmed string) OR $default if not set.
 * Note: This returns "0" correctly when posted.
 */
function post_val($key, $default = null)
{
  if (!isset($_POST[$key])) return $default;
  return trim((string)$_POST[$key]);
}

/**
 * Required field checker that does NOT reject "0"
 */
function require_field($key, $label = null)
{
  $label = $label ?: $key;

  if (!isset($_POST[$key])) {
    respond(false, "Missing required field: {$label}");
  }

  $v = trim((string)$_POST[$key]);

  // Only reject truly empty string
  if ($v === "") {
    respond(false, "Missing required field: {$label}");
  }

  return $v;
}

/**
 * Upload helper (stores file on disk, returns relative path to save in DB)
 */
function save_upload($field, $destDirAbs, $destDirRel, $prefix, $allowedExt = [], $maxBytes = 5242880)
{
  if (!isset($_FILES[$field])) return null;

  $f = $_FILES[$field];

  if (!isset($f["error"]) || is_array($f["error"])) {
    throw new Exception("Invalid upload field: {$field}");
  }

  if ($f["error"] === UPLOAD_ERR_NO_FILE) {
    return null; // optional file
  }

  if ($f["error"] !== UPLOAD_ERR_OK) {
    throw new Exception("Upload error for {$field} (code {$f["error"]})");
  }

  if ($f["size"] > $maxBytes) {
    throw new Exception("File too large for {$field}. Max " . round($maxBytes / 1024 / 1024) . "MB");
  }

  $originalName = $f["name"];
  $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

  if (!empty($allowedExt) && !in_array($ext, $allowedExt, true)) {
    throw new Exception("Invalid file type for {$field}. Allowed: " . implode(", ", $allowedExt));
  }

  if (!is_dir($destDirAbs)) {
    if (!mkdir($destDirAbs, 0777, true)) {
      throw new Exception("Failed to create upload directory.");
    }
  }

  $stamp = date("Ymd_His");
  $rand  = bin2hex(random_bytes(4));
  $safeName = $prefix . "_" . $stamp . "_" . $rand . "." . $ext;

  $targetAbs = rtrim($destDirAbs, "/\\") . DIRECTORY_SEPARATOR . $safeName;

  if (!move_uploaded_file($f["tmp_name"], $targetAbs)) {
    throw new Exception("Failed to save uploaded file: {$field}");
  }

  $targetRel = rtrim($destDirRel, "/") . "/" . $safeName;
  return $targetRel;
}

/* --------- basic inputs --------- */
$visa_type        = require_field("visa_type");
$selected_country = require_field("selected_country");
$entry_source     = post_val("entry_source", "");

/* visa types */
$allowed_types = ["business", "immigration", "travel", "family", "student", "processing"];
if (!in_array($visa_type, $allowed_types, true)) {
  respond(false, "Invalid visa type.");
}

/* --------- common required fields --------- */
$first_name                = require_field("first_name");
$last_name                 = require_field("last_name");
$gender                    = require_field("gender");
$date_of_birth             = require_field("date_of_birth");
$birth_city                = require_field("birth_city");
$birth_country             = require_field("birth_country");
$nationality               = require_field("nationality");
$current_residence_country = require_field("current_residence_country");
$marital_status            = require_field("marital_status");

$passport_type             = require_field("passport_type");
$passport_number           = require_field("passport_number");
$issuing_country           = require_field("issuing_country");
$issuing_authority         = require_field("issuing_authority");
$date_of_issue             = require_field("date_of_issue");
$expiry_date               = require_field("expiry_date");

/**
 * ✅ THIS ONE WAS FAILING BEFORE (because "0" looked false)
 */
$has_another_str           = require_field("has_another_valid_passport");
$has_another               = (int)$has_another_str;

$residential_address       = require_field("residential_address");
$city                      = require_field("city");
$state_province            = require_field("state_province");
$postal_code               = require_field("postal_code");
$country                   = require_field("country");
$mobile_phone              = require_field("mobile_phone");
$email                     = require_field("email");

/* optional fields */
$middle_name              = post_val("middle_name", "");
$national_id_number       = post_val("national_id_number", "");
$previous_passport_number = post_val("previous_passport_number", "");
$alt_phone                = post_val("alt_phone", "");

/* --------- visa-type extra required fields --------- */
$extra_required = [];
$school_name = $course = $company_name = $business_purpose = $sponsor_name = $relationship = $travel_date = $return_date = $immigration_reason = "";

if ($visa_type === "student") {
  $extra_required = ["school_name", "course"];
  $school_name = require_field("school_name");
  $course = require_field("course");
} elseif ($visa_type === "business") {
  $extra_required = ["company_name", "business_purpose"];
  $company_name = require_field("company_name");
  $business_purpose = require_field("business_purpose");
} elseif ($visa_type === "family") {
  $extra_required = ["sponsor_name", "relationship"];
  $sponsor_name = require_field("sponsor_name");
  $relationship = require_field("relationship");
} elseif ($visa_type === "travel") {
  $extra_required = ["travel_date", "return_date"];
  $travel_date = require_field("travel_date");
  $return_date = require_field("return_date");
} elseif ($visa_type === "immigration") {
  $extra_required = ["immigration_reason"];
  $immigration_reason = require_field("immigration_reason");
}

/* --------- Determine which table to use based on visa type --------- */
$table_name = "";
$application_ref = "";

switch ($visa_type) {
  case "business":
    $table_name = "business_visa_applications";
    $application_ref = "BUS" . date("YmdHis") . mt_rand(100, 999);
    break;
  case "student":
    $table_name = "student_visa_applications";
    $application_ref = "STU" . date("YmdHis") . mt_rand(100, 999);
    break;
  case "family":
    $table_name = "family_visa_applications";
    $application_ref = "FAM" . date("YmdHis") . mt_rand(100, 999);
    break;
  case "travel":
    $table_name = "travel_visa_applications";
    $application_ref = "TRV" . date("YmdHis") . mt_rand(100, 999);
    break;
  case "immigration":
    $table_name = "immigration_visa_applications";
    $application_ref = "IMM" . date("YmdHis") . mt_rand(100, 999);
    break;
  case "processing":
    // For processing, use travel_visa_applications as default
    $table_name = "travel_visa_applications";
    $application_ref = "PRO" . date("YmdHis") . mt_rand(100, 999);
    $visa_type = "travel"; // Override for table compatibility
    break;
  default:
    respond(false, "Unsupported visa type.");
}

/* --------- insert main application --------- */
// Fixed SQL - only 30 parameters
$sql = "INSERT INTO $table_name (
  application_ref, entry_source, current_step, status,
  first_name, middle_name, last_name, gender, date_of_birth, 
  birth_city, birth_country, nationality, current_residence_country, 
  marital_status, national_id_number,
  passport_type, passport_number, issuing_country, issuing_authority, 
  date_of_issue, expiry_date, previous_passport_number, 
  has_another_valid_passport,
  residential_address, city, state_province, postal_code, country, 
  mobile_phone, alt_phone, email,
  destination_country
) VALUES (
  ?, ?, 1, 'submitted',
  ?, ?, ?, ?, ?, 
  ?, ?, ?, ?, 
  ?, ?,
  ?, ?, ?, ?, 
  ?, ?, ?, 
  ?,
  ?, ?, ?, ?, ?, 
  ?, ?, ?,
  ?
)";

$stmt = mysqli_prepare($connection, $sql);
if (!$stmt) {
  respond(false, "DB error: failed to prepare statement.", ["error" => mysqli_error($connection)]);
}

// Create parameters array - COUNT THEM: 30 parameters
$params = [
  $application_ref,                    // 1
  $entry_source,                       // 2
  
  $first_name,                         // 3
  $middle_name,                        // 4
  $last_name,                          // 5
  $gender,                             // 6
  $date_of_birth,                      // 7
  $birth_city,                         // 8
  $birth_country,                      // 9
  $nationality,                        // 10
  $current_residence_country,          // 11
  $marital_status,                     // 12
  $national_id_number,                 // 13
  
  $passport_type,                      // 14
  $passport_number,                    // 15
  $issuing_country,                    // 16
  $issuing_authority,                  // 17
  $date_of_issue,                      // 18
  $expiry_date,                        // 19
  $previous_passport_number,           // 20
  $has_another,                        // 21
  
  $residential_address,                // 22
  $city,                               // 23
  $state_province,                     // 24
  $postal_code,                        // 25
  $country,                            // 26
  $mobile_phone,                       // 27
  $alt_phone,                          // 28
  $email,                              // 29
  
  $selected_country                    // 30 - destination_country
];

// Debug: Check parameter count - SHOULD BE 30
$expected_count = 30;
if (count($params) !== $expected_count) {
  respond(false, "Parameter count mismatch. Expected $expected_count, got " . count($params), [
    "params" => $params,
    "param_count" => count($params),
    "param_names" => [
      "application_ref", "entry_source", "first_name", "middle_name", "last_name",
      "gender", "date_of_birth", "birth_city", "birth_country", "nationality",
      "current_residence_country", "marital_status", "national_id_number",
      "passport_type", "passport_number", "issuing_country", "issuing_authority",
      "date_of_issue", "expiry_date", "previous_passport_number", "has_another",
      "residential_address", "city", "state_province", "postal_code", "country",
      "mobile_phone", "alt_phone", "email", "destination_country"
    ]
  ]);
}

// Create type string: 30 parameters, mostly strings
$types = "";
for ($i = 0; $i < 30; $i++) {
  $types .= "s"; // All strings for now
}

// Prepare the bind parameters array
$bind_params = array_merge([$stmt, $types], $params);

// Fix: Create references for mysqli_stmt_bind_param
$refs = [];
foreach ($bind_params as $key => $value) {
  if ($key === 0 || $key === 1) {
    // First two elements are $stmt and $types
    $refs[$key] = $value;
  } else {
    // Create references for the values
    $refs[$key] = &$bind_params[$key];
  }
}

if (!call_user_func_array('mysqli_stmt_bind_param', $refs)) {
  respond(false, "Failed to bind parameters.", ["error" => mysqli_stmt_error($stmt)]);
}

$ok = mysqli_stmt_execute($stmt);
if (!$ok) {
  $err = mysqli_stmt_error($stmt);
  mysqli_stmt_close($stmt);
  respond(false, "DB error: failed to save application.", ["error" => $err]);
}

$app_id = mysqli_insert_id($connection);
mysqli_stmt_close($stmt);

// Update visa-specific fields if needed
if ($visa_type === "immigration" && !empty($immigration_reason)) {
  $update_sql = "UPDATE $table_name SET immigration_type = ? WHERE id = ?";
  $update_stmt = mysqli_prepare($connection, $update_sql);
  if ($update_stmt) {
    mysqli_stmt_bind_param($update_stmt, "si", $immigration_reason, $app_id);
    mysqli_stmt_execute($update_stmt);
    mysqli_stmt_close($update_stmt);
  }
}

/* --------- Handle file uploads --------- */
try {
  $projectRoot = realpath(__DIR__ . "/../../");
  if (!$projectRoot) {
    throw new Exception("Server path error: project root not found.");
  }

  $uploadsRel = "uploads/visa_applications/" . $app_id;
  $uploadsAbs = $projectRoot . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $uploadsRel);

  $allowedPassport = ["jpg", "jpeg", "png", "webp", "pdf"];

  // Upload passport biodata
  $passport_biodata_path = save_upload("passport_biodata", $uploadsAbs, $uploadsRel, "passport_biodata", $allowedPassport, 8 * 1024 * 1024);
  if (!$passport_biodata_path) {
    throw new Exception("Passport Bio-Data Page is required.");
  }

  // Upload passport photo
  $passport_photo_path = save_upload(
    "passport_photo",
    $uploadsAbs,
    $uploadsRel,
    "passport_photo",
    ["jpg", "jpeg", "png", "webp"],
    5 * 1024 * 1024
  );

  // Prepare file update SQL
  $update_file_sql = "UPDATE $table_name SET doc_passport_biodata = ?";
  $file_params = [$passport_biodata_path];
  $file_types = "s";
  
  if ($passport_photo_path) {
    $update_file_sql .= ", doc_passport_photo = ?";
    $file_params[] = $passport_photo_path;
    $file_types .= "s";
  }
  
  // Upload optional files based on visa type
  if ($visa_type === "student" || $visa_type === "business") {
    $field_name = $visa_type === "student" ? "student_letter" : "business_letter";
    $optional_file = save_upload(
      $field_name,
      $uploadsAbs,
      $uploadsRel,
      $field_name,
      ["jpg", "jpeg", "png", "webp", "pdf"],
      10 * 1024 * 1024
    );
    if ($optional_file) {
      $update_file_sql .= ", doc_employment_or_school_letter = ?";
      $file_params[] = $optional_file;
      $file_types .= "s";
    }
  } elseif ($visa_type === "family") {
    $optional_file = save_upload(
      "family_invitation",
      $uploadsAbs,
      $uploadsRel,
      "family_invitation",
      ["jpg", "jpeg", "png", "webp", "pdf"],
      10 * 1024 * 1024
    );
    if ($optional_file) {
      $update_file_sql .= ", doc_hotel_booking_or_invitation = ?";
      $file_params[] = $optional_file;
      $file_types .= "s";
    }
  } elseif ($visa_type === "travel" || $visa_type === "processing") {
    $optional_file = save_upload(
      "travel_docs",
      $uploadsAbs,
      $uploadsRel,
      "travel_docs",
      ["jpg", "jpeg", "png", "webp", "pdf"],
      10 * 1024 * 1024
    );
    if ($optional_file) {
      $update_file_sql .= ", doc_travel_itinerary = ?";
      $file_params[] = $optional_file;
      $file_types .= "s";
    }
  } elseif ($visa_type === "immigration") {
    $optional_file = save_upload(
      "immigration_supporting",
      $uploadsAbs,
      $uploadsRel,
      "immigration_supporting",
      ["jpg", "jpeg", "png", "webp", "pdf"],
      10 * 1024 * 1024
    );
    if ($optional_file) {
      $update_file_sql .= ", doc_additional_supporting = ?";
      $file_params[] = $optional_file;
      $file_types .= "s";
    }
  }
  
  $update_file_sql .= " WHERE id = ?";
  $file_params[] = $app_id;
  $file_types .= "i";
  
  $update_file_stmt = mysqli_prepare($connection, $update_file_sql);
  if ($update_file_stmt) {
    // Prepare bind parameters for file update
    $bind_file_params = array_merge([$update_file_stmt, $file_types], $file_params);
    $file_refs = [];
    foreach ($bind_file_params as $key => $value) {
      if ($key === 0 || $key === 1) {
        $file_refs[$key] = $value;
      } else {
        $file_refs[$key] = &$bind_file_params[$key];
      }
    }
    
    if (!call_user_func_array('mysqli_stmt_bind_param', $file_refs)) {
      throw new Exception("Failed to bind file parameters: " . mysqli_stmt_error($update_file_stmt));
    }
    if (!mysqli_stmt_execute($update_file_stmt)) {
      throw new Exception("Failed to update file paths: " . mysqli_stmt_error($update_file_stmt));
    }
    mysqli_stmt_close($update_file_stmt);
  } else {
    throw new Exception("Failed to prepare file update statement: " . mysqli_error($connection));
  }

} catch (Exception $e) {
  // If there's a file upload error, the application is already saved
  // So we return success but with a warning
  respond(true, "Application submitted but with file upload issues: " . $e->getMessage(), [
    "application_id" => $app_id,
    "application_ref" => $application_ref,
    "visa_type" => $visa_type,
    "warning" => $e->getMessage()
  ]);
}

respond(true, "Application submitted successfully!", [
  "application_id" => $app_id,
  "application_ref" => $application_ref,
  "visa_type" => $visa_type
]);

