<?php

include('../../server/connection.php');
session_start();

if (!isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != true) {
    echo "<script> window.location.href = '../' </script>";
    exit;
}

if (!isset($_GET['ref'], $_GET['type'])) {
    die("Invalid request");
}

$ref = trim($_GET['ref']);
$type = trim($_GET['type']);
$table = trim($_GET['table'] ?? '');

$allowedTables = ['business', 'tourist', 'family', 'student', 'work', 'vacation'];

if (!in_array($type, $allowedTables)) {
    die("Invalid visa type");
}

/* ================= FETCH APPLICATION ================= */

$stmt = $connection->prepare("SELECT * FROM `$table` WHERE application_ref=?");
$stmt->bind_param("s", $ref);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) die("Application not found");

$fetch = $result->fetch_assoc();

/* ================= FETCH TIMELINE ================= */

$timeline_stmt = $connection->prepare("
SELECT *
FROM visa_application_timeline
WHERE application_ref=?
ORDER BY created_at DESC
");

$timeline_stmt->bind_param("s", $fetch['application_ref']);
$timeline_stmt->execute();

$timeline_rows = $timeline_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

/* ================= POST UPDATE ================= */

if (isset($_POST['update_application'])) {

    $ref = $_POST['application_ref'];

    $arrival = $_POST['arrival_date'] ?? null;
    $departure = $_POST['departure_date'] ?? null;

    $visa_table = $fetch['visa_table'] ?? $table;

    /* ✅ Update Application Table */

    $stmt = $connection->prepare("
        UPDATE {$visa_table}
        SET arrival_date=?, departure_date=?
        WHERE application_ref=?
    ");

    $stmt->bind_param("sss", $arrival, $departure, $ref);
    $stmt->execute();
    $stmt->close();

    /* ================= UPDATE TIMELINE ================= */

    if (!empty($_POST['timeline_id'])) {

        $ids = $_POST['timeline_id'];
        $titles = $_POST['timeline_title'];
        $descriptions = $_POST['timeline_description'];
        $dates = $_POST['timeline_date'];
        $statuses = $_POST['timeline_status'];

        $count = count($ids);

        for ($i = 0; $i < $count; $i++) {

            $title = $titles[$i] ?? '';
            $description = $descriptions[$i] ?? '';
            $status = $statuses[$i] ?? '';
            $id = $ids[$i] ?? '';

            $stmt = $connection->prepare("
    UPDATE visa_application_timeline
    SET title=?, description=?, event_date=?, status=?
    WHERE id=? AND application_ref=?
");

            $stmt->bind_param(
                "ssssss",
                $title,
                $description,
                $event_date,
                $status,
                $id,
                $ref
            );

            $stmt->execute();
            $stmt->close();
        }
    }

    echo "<script>
alert('Application Updated Successfully');
window.location.href = window.location.href;
</script>";

    exit;
}



function safeValue($array, $key, $prefix = '', $suffix = '')
{
    if (!is_array($array)) return 'N/A';

    if (array_key_exists($key, $array) && $array[$key] !== null && $array[$key] !== '') {
        return $prefix . htmlspecialchars($array[$key]) . $suffix;
    }

    return 'N/A';
}



/* ===============================
 PAYMENT MANAGEMENT INSERT
=============================== */

if (isset($_POST['save_payment'])) {

    $tracking_id = trim($_POST['tracking_id']);

    $payment_type = $_POST['payment_type'] ?? '';

    $travel_cost = $_POST['travel_cost'] ?? 0;

    $bank_name = $_POST['bank_name'] ?? null;
    $account_number = $_POST['account_number'] ?? null;
    $account_name = $_POST['account_name'] ?? null;

    $wallet_name = $_POST['wallet_name'] ?? null;
    $wallet_address = $_POST['wallet_address'] ?? null;

    /* ⭐ Check uniqueness */
    $check = $connection->prepare("
        SELECT id FROM payment WHERE tracking_id=?
    ");

    $check->bind_param("s", $tracking_id);
    $check->execute();

    if ($check->get_result()->num_rows > 0) {

        echo "<script>alert('Payment already exists for this tracking ID');</script>";
        exit;
    }

    $check->close();

    /* ⭐ Insert payment */

    $stmt = $connection->prepare("
        INSERT INTO payment
        (tracking_id,payment_type,bank_name,account_number,account_name,
        wallet_name,wallet_address,travel_cost)
        VALUES (?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param(
        "sssssssd",
        $tracking_id,
        $payment_type,
        $bank_name,
        $account_number,
        $account_name,
        $wallet_name,
        $wallet_address,
        $travel_cost
    );

    $stmt->execute();
    $stmt->close();

    echo "<script>
    alert('Payment Saved Successfully');
    window.location.href=window.location.href;
    </script>";
}



?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo  $sitename ?>- Admin Dashboard</title>

    <link rel="icon" type="image/x-icon" href="../source/assets/img/favicon.ico">
    <link href="../source/assets/css/loader.css" rel="stylesheet" type="text/css">
    <script src="../source/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="../source/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../source/assets/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="../source/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../source/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../source/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics">
    <link rel="stylesheet" type="text/css" href="../source/plugins/dropify/dropify.min.css">
    <link href="../source/assets/css/users/account-setting.css" rel="stylesheet" type="text/css">
    <link href="../source/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../source/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../source/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../source/assets/css/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="../source/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="../assets/css/card/displayCard.css">

    <link href="../source/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="../source/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="../source/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css">
    <script src="../source/plugins/sweetalerts/promise-polyfill.js"></script>
    <script src="../source/assets/js/libs/jquery-3.1.1.min.js"></script>

    <style>
        .status-badge {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 999px;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .type-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: #f1f3f5;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
            white-space: nowrap;
        }

        .action-btn {
            border: none;
            border-radius: 20px;
            padding: 6px 14px;
            color: #fff;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-approve {
            background: #198754;
        }

        .btn-decline {
            background: #dc3545;
        }

        .btn-disabled {
            opacity: .6;
            cursor: not-allowed;
        }
    </style>

</head>

<body class="dashboard-analytics">

    <?php include("../includes/navbar.php")  ?>

    <div class="main-container" id="container">

        <div class="overlay show"></div>
        <div class="search-overlay"></div>

        <?php include("../includes/sidebar.php")  ?>

        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Visa Applications Details</h3>
                    </div>
                </div>

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">



                                            <div class="card shadow-sm mb-4">
                                                <div class="card-header bg-dark text-white">
                                                    <h5 class="mb-0">Visa Application Details</h5>
                                                </div>

                                                <div class="card-body">

                                                    <!-- ================= PERSONAL INFO ================= -->
                                                    <hr>
                                                    <h6 class="mb-3 text-primary">Applicant Personal Information</h6>

                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label>Status</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'status') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>First Name</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'first_name') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Middle Name</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'middle_name') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Last Name</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'last_name') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Gender</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'gender') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Date of Birth</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'date_of_birth') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Birth City</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'birth_city') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Birth Country</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'birth_country') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Nationality</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'nationality') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Residence Country</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'current_residence_country') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Marital Status</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'marital_status') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Passport Type</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'passport_type') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Passport Number</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'passport_number') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Issuing Country</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'issuing_country') ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label>Issuing Authority</label>
                                                            <input class="form-control" value="<?= safeValue($fetch, 'issuing_authority') ?>" readonly>
                                                        </div>

                                                    </div>


                                                    <!-- ================= TRAVEL INFO ================= -->
                                                    <hr>
                                                    <h6 class="mb-3 text-primary">Travel Information</h6>
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Arrival Date</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'arrival_date'); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Departure Date</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'departure_date'); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Duration (Days)</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'duration_days', '', ' days'); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Number of Entries</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'number_of_entries'); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-8 mb-3">
                                                            <label class="form-label">Purpose of Travel</label>
                                                            <textarea class="form-control text-black" rows="2" readonly><?php
                                                                                                                        echo safeValue($fetch, 'purpose_of_travel');
                                                                                                                        ?></textarea>
                                                        </div>

                                                    </div>


                                                    <!-- ================= FINANCIAL INFO ================= -->
                                                    <hr>
                                                    <h6 class="mb-3 text-primary">Financial Information</h6>
                                                    <div class="row">



                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Available Funds</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'available_funds_amount', '$'); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Bank Name</label>
                                                            <input type="text" class="form-control text-black"
                                                                value="<?php echo safeValue($fetch, 'bank_name'); ?>" readonly>
                                                        </div>

                                                    </div>


                                                    <!-- ================= DOCUMENTS ================= -->
                                                    <hr>
                                                    <h6 class="mb-3 text-primary">Uploaded Documents</h6>
                                                    <div class="row">

                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Passport Copy</label><br>
                                                            <?php if (!empty($fetch['doc_passport'])): ?>
                                                                <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_passport']); ?>"
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-outline-success">View</a>
                                                            <?php else: ?>
                                                                <span class="text-muted">N/A</span>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Bank Statement</label><br>
                                                            <?php if (!empty($fetch['doc_bank_statement'])): ?>
                                                                <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_bank_statement']); ?>"
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-outline-success">View</a>
                                                            <?php else: ?>
                                                                <span class="text-muted">N/A</span>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Flight Ticket</label><br>
                                                            <?php if (!empty($fetch['doc_flight_ticket'])): ?>
                                                                <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_flight_ticket']); ?>"
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-outline-success">View</a>
                                                            <?php else: ?>
                                                                <span class="text-muted">N/A</span>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">Hotel Reservation</label><br>
                                                            <?php if (!empty($fetch['doc_hotel_reservation'])): ?>
                                                                <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_hotel_reservation']); ?>"
                                                                    target="_blank"
                                                                    class="btn btn-sm btn-outline-success">View</a>
                                                            <?php else: ?>
                                                                <span class="text-muted">N/A</span>
                                                            <?php endif; ?>
                                                        </div>

                                                    </div>


                                                    <hr>
                                                    <form method="POST">

                                                        <input type="hidden" name="application_ref"
                                                            value="<?= htmlspecialchars($fetch['application_ref']) ?>">


                                                        <h5 class="text-danger">Application Management</h5>

                                                        <div class="row">

                                                            <div class="col-md-3">
                                                                <label>Arrival Date</label>
                                                                <input type="date" name="arrival_date" class="form-control"
                                                                    value="<?= $fetch['arrival_date'] ?? '' ?>">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label>Departure Date</label>
                                                                <input type="date" name="departure_date" class="form-control"
                                                                    value="<?= $fetch['departure_date'] ?? '' ?>">
                                                            </div>


                                                        </div>

                                                        <hr>

                                                        <h5 class="text-danger">Timeline Management</h5>

                                                        <table class="table table-bordered">

                                                            <thead class="table-dark">
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Description</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php foreach ($timeline_rows as $t): ?>

                                                                    <tr>

                                                                        <td>
                                                                            <input type="hidden" name="timeline_id[]" value="<?= $t['id'] ?>">

                                                                            <input name="timeline_title[]" class="form-control"
                                                                                value="<?= htmlspecialchars($t['title']) ?>">
                                                                        </td>

                                                                        <td>
                                                                            <textarea name="timeline_description[]" class="form-control">
                                                                    <?= htmlspecialchars($t['description']) ?>
                                                                    </textarea>
                                                                        </td>

                                                                        <td>
                                                                            <input type="date" name="timeline_date[]" class="form-control"
                                                                                value="<?= !empty($t['event_date']) ? date('Y-m-d', strtotime($t['event_date'])) : '' ?>">
                                                                        </td>

                                                                        <td>


                                                                            <select name="timeline_status[]" class="form-control">
                                                                                <option value="pending" <?= $t['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                                                                <option value="approved" <?= $t['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
                                                                                <option value="rejected" <?= $t['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                                                                                <option value="paid" <?= $t['status'] === 'paid' ? 'selected' : '' ?>>Paid=> This is when user has paid</option>
                                                                                <option value="set_by_admin" <?= $t['status'] === 'set_by_admin' ? 'selected' : '' ?>>Payment Set by Admin</option>
                                                                            </select>
                                                                        </td>

                                                                        

                                                                    </tr>

                                                                <?php endforeach; ?>

                                                            </tbody>
                                                        </table>

                                                        <button class="btn btn-primary" name="update_application">
                                                            Update Application
                                                        </button>



                                                    </form>


                                                    <hr>
                                                    <h5 class="text-danger mb-3">Payment Management</h5>

                                                    <form method="POST">

                                                        <input type="hidden" name="tracking_id"
                                                            value="<?= htmlspecialchars($fetch['application_ref'] ?? '') ?>">

                                                        <div class="row">

                                                            <div class="col-md-4 mb-3">
                                                                <label>Payment Type</label>
                                                                <select name="payment_type" class="form-control" id="payment_type">
                                                                    <option value="">Select Payment Type</option>
                                                                    <option value="bank">Bank</option>
                                                                    <option value="crypto">Crypto</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label>Travel Cost ($)</label>
                                                                <input type="number" step="0.01" name="travel_cost"
                                                                    class="form-control">
                                                            </div>

                                                        </div>

                                                        <!-- BANK SECTION -->

                                                        <div id="bank_section" style="display:none">
                                                            <div class="row">

                                                                <div class="col-md-4 mb-3">
                                                                    <label>Bank Name</label>
                                                                    <input name="bank_name" class="form-control">
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                    <label>Account Number</label>
                                                                    <input name="account_number" class="form-control">
                                                                </div>

                                                                <div class="col-md-4 mb-3">
                                                                    <label>Account Name</label>
                                                                    <input name="account_name" class="form-control">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- CRYPTO SECTION -->

                                                        <div id="crypto_section" style="display:none">
                                                            <div class="row">

                                                                <div class="col-md-4 mb-3">
                                                                    <label>Wallet Name</label>
                                                                    <input name="wallet_name" class="form-control">
                                                                </div>

                                                                <div class="col-md-8 mb-3">
                                                                    <label>Wallet Address</label>
                                                                    <input name="wallet_address" class="form-control">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <button class="btn btn-success" name="save_payment">
                                                            Save Payment
                                                        </button>

                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function sweatAlert(icon, title, text) {
                            Swal.fire({
                                icon,
                                title,
                                text
                            });
                        }

                        function badgeColor(status) {
                            const map = {
                                draft: '#6c757d',
                                submitted: '#0d6efd',
                                under_review: '#ffc107',
                                additional_documents_required: '#fd7e14',
                                approved: '#198754',
                                rejected: '#dc3545',
                                visa_issued: '#20c997'
                            };
                            return map[status] || '#6c757d';
                        }

                        document.getElementById("payment_type").addEventListener("change", function() {

                            let bank = document.getElementById("bank_section");
                            let crypto = document.getElementById("crypto_section");

                            bank.style.display = "none";
                            crypto.style.display = "none";

                            if (this.value === "bank") {
                                bank.style.display = "block";
                            }

                            if (this.value === "crypto") {
                                crypto.style.display = "block";
                            }

                        });
                    </script>


                </div>

                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a target="_blank" href="/"><?php echo  $sitename ?></a>, All rights reserved.
                        </p>
                    </div>
                    <div class="footer-section f-section-2">
                        <p class=""><?php echo  $sitename ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="../source/bootstrap/js/popper.min.js"></script>
        <script src="../source/bootstrap/js/bootstrap.min.js"></script>
        <script src="../source/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="../source/assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="../source/assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="../source/plugins/apex/apexcharts.min.js"></script>
        <script src="../source/assets/js/dashboard/dash_1.js"></script>

        <script src="../source/plugins/dropify/dropify.min.js"></script>
        <script src="../source/plugins/blockui/jquery.blockUI.min.js"></script>
        <script src="../source/assets/js/users/account-settings.js"></script>

        <script src="../source/plugins/highlight/highlight.pack.js"></script>
        <script src="../source/plugins/table/datatable/datatables.js"></script>
        <script src="../source/plugins/select2/select2.min.js"></script>
        <script src="../source/plugins/select2/custom-select2.js"></script>

        <!-- <script src="../source/plugins/sweetalerts/sweetalert2.min.js"></script> -->
        <!-- <script src="../source/plugins/sweetalerts/custom-sweetalert.js"></script> -->

        <script>
            var ss = $(".basic").select2({
                tags: true
            });
        </script>

        <script>
            $('input').attr('autocomplete', 'off');
        </script>
        <script>
            function toggleVisaIssueBox() {

                let status = document.querySelector("[name='status']").value;
                let box = document.getElementById("visa_issue_box");

                if (status === "visa_issues") {
                    box.style.display = "block";
                } else {
                    box.style.display = "none";
                }

            }

            function duplicateRow(btn) {

                let row = btn.closest("tr");
                let clone = row.cloneNode(true);

                row.parentNode.appendChild(clone);
            }

            document.addEventListener("DOMContentLoaded", () => {
                toggleVisaIssueBox();
                document.querySelector("[name='status']")
                    .addEventListener("change", toggleVisaIssueBox);
            });
        </script>

        <script>
            $('#default-ordering').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y1="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y1="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7,
                drawCallback: function() {
                    $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5');
                }
            });
        </script>

    </div>
</body>

</html>