<?php
include('../../server/connection.php');
session_start();



if (!isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != true) echo "<script> window.location.href = '../' </script>";




if (!isset($_GET['ref'], $_GET['type'])) {
    die("Invalid request");
}

$ref = trim($_GET['ref']);
$type = trim($_GET['type']);
$table = trim($_GET['table'] ?? ''); // optional, for extra security

// Whitelist allowed tables (VERY IMPORTANT)
$allowedTables = ['business', 'tourist', 'family', 'student', 'work', 'vacation'];

if (!in_array($type, $allowedTables)) {
    die("Invalid visa type");
}


$sql = "SELECT * FROM `$table` WHERE application_ref = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $ref);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Application not found");
}

$fetch = $result->fetch_assoc();


function badgeColor($status)
{
    $map = [
        'draft' => '#6c757d',
        'submitted' => '#0d6efd',
        'under_review' => '#ffc107',
        'additional_documents_required' => '#fd7e14',
        'approved' => '#198754',
        'rejected' => '#dc3545',
        'visa_issued' => '#20c997',
    ];
    return $map[$status] ?? '#6c757d';
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



                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Personal Information</h5>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['first_name']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['middle_name']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['last_name']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Gender</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['gender']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Date of Birth</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['date_of_birth']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Nationality</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['nationality']); ?>" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Passport Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Passport Number</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['passport_number']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Issuing Country</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['issuing_country']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Expiry Date</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['expiry_date']); ?>" disabled>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Travel Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Destination Country</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['destination_country']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Arrival Date</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['arrival_date']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Departure Date</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['departure_date']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Number of Entries</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['number_of_entries']); ?>" readonly>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Financial Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Estimated Travel Cost</label>
                                                            <input type="text" class="form-control text-black" value="$<?php echo htmlspecialchars($fetch['estimated_travel_cost']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Available Funds</label>
                                                            <input type="text" class="form-control text-black" value="$<?php echo htmlspecialchars($fetch['available_funds_amount']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label class="form-label">Bank Name</label>
                                                            <input type="text" class="form-control text-black" value="<?php echo htmlspecialchars($fetch['bank_name']); ?>" readonly>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Uploaded Documents</h5>
                                                </div>
                                                <div class="card-body">

                                                    <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_passport_biodata']); ?>" target="_blank" class="btn btn-sm btn-outline-primary">Passport Biodata</a>

                                                    <a href="../uploads/<?php echo htmlspecialchars($fetch['doc_bank_statement']); ?>" target="_blank" class="btn btn-sm btn-outline-success">Bank Statement</a>

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

                        // ✅ EVENT DELEGATION (works with DataTables redraw)
                        document.addEventListener('click', async function(e) {
                            const button = e.target.closest('.js-action');
                            if (!button) return;

                            e.preventDefault();
                            if (button.disabled) return;

                            console.log("Clicked:", button.dataset);

                            try {
                                const action = button.dataset.action; // approve | decline
                                const visaType = button.dataset.visaType; // business/family/...
                                const ref = button.dataset.ref;

                                const confirmBox = await Swal.fire({
                                    icon: "question",
                                    title: action === "approve" ? "Approve Application?" : "Decline Application?",
                                    text: "This will update the application status.",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, Continue",
                                    cancelButtonText: "Cancel"
                                });

                                if (!confirmBox.isConfirmed) return;

                                Swal.fire({
                                    title: "Please wait...",
                                    allowOutsideClick: false,
                                    didOpen: () => Swal.showLoading()
                                });

                                // ✅ same folder
                                const url = "./update_application_status.php?action=" +
                                    encodeURIComponent(action) +
                                    "&visa_type=" + encodeURIComponent(visaType) +
                                    "&application_ref=" + encodeURIComponent(ref);

                                console.log("Fetching:", url); // ✅ confirm the URL

                                const response = await fetch(url, {
                                    method: "GET"
                                });
                                const data = await response.json();

                                if (!response.ok) {
                                    throw new Error(data?.message || ("Request failed: " + response.status));
                                }
                                if (data.status !== "success") {
                                    throw new Error(data.message || "Failed");
                                }

                                const newStatus = data.new_status || (action === "approve" ? "approved" : "rejected");

                                // ✅ Update UI instantly
                                const tr = button.closest('tr');
                                if (tr) {
                                    // update status badge text + color
                                    const badge = tr.querySelector('td:nth-child(8) .status-badge');
                                    if (badge) {
                                        badge.style.background = badgeColor(newStatus);
                                        badge.textContent = newStatus.replaceAll('_', ' ');
                                    }

                                    // replace action buttons with final badge
                                    const actionCell = tr.querySelector('.action-cell');
                                    if (actionCell) {
                                        if (newStatus === "approved") {
                                            actionCell.innerHTML = '<span class="status-badge" style="background:#198754;">Approved</span>';
                                        } else if (newStatus === "rejected") {
                                            actionCell.innerHTML = '<span class="status-badge" style="background:#dc3545;">Declined</span>';
                                        }
                                    }
                                }

                                Swal.close();
                                sweatAlert("success", "Tips", data.message);

                            } catch (err) {
                                Swal.close();
                                sweatAlert("error", "Tips", err.message);
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