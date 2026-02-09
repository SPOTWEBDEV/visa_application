<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../../server/connection.php");
if (!isset($_SESSION['admin_id'])) {
    header("location: ../");
    exit;
}


$sql = "
    SELECT 
        'business' AS visa_type,
        id,
        application_ref,
        first_name,
        last_name,
        email,
        passport_number,
        destination_country,
        entry_source,
        status,
        created_at
    FROM business_visa_applications

    UNION ALL

    SELECT 
        'family' AS visa_type,
        id,
        application_ref,
        first_name,
        last_name,
        email,
        passport_number,
        destination_country,
        entry_source,
        status,
        created_at
    FROM family_visa_applications

    UNION ALL

    SELECT 
        'immigration' AS visa_type,
        id,
        application_ref,
        first_name,
        last_name,
        email,
        passport_number,
        destination_country,
        entry_source,
        status,
        created_at
    FROM immigration_visa_applications

    UNION ALL

    SELECT 
        'student' AS visa_type,
        id,
        application_ref,
        first_name,
        last_name,
        email,
        passport_number,
        destination_country,
        entry_source,
        status,
        created_at
    FROM student_visa_applications

    UNION ALL

    SELECT 
        'travel' AS visa_type,
        id,
        application_ref,
        first_name,
        last_name,
        email,
        passport_number,
        destination_country,
        entry_source,
        status,
        created_at
    FROM travel_visa_applications

    ORDER BY created_at DESC
";

$rows = [];
$res = mysqli_query($connection, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    mysqli_free_result($res);
}

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
                        <h3>All Visa Applications</h3>
                    </div>
                </div>

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <div id="default-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table id="default-ordering" class="table table-hover dataTable no-footer" style="width:100%" role="grid" aria-describedby="default-ordering_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>S/N</th>
                                                        <th>VISA TYPE</th>
                                                        <th>TRACKING ID</th>
                                                        <th>APPLICANT</th>
                                                        <th>EMAIL</th>
                                                        <th>PASSPORT NO</th>
                                                        <th>DESTINATION</th>
                                                        <th>ENTRY SOURCE</th>
                                                        <th>STATUS</th>
                                                        <th>CREATED</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if (!empty($rows)) : ?>
                                                        <?php $count = 0;
                                                        foreach ($rows as $r) : $count++; ?>
                                                            <?php
                                                            $visaTypeRaw = $r['visa_type'];
                                                            $refRaw = $r['application_ref'];
                                                            $disabled = in_array($r['status'], ['approved', 'rejected', 'visa_issued'], true);

                                                            $visaType = htmlspecialchars($visaTypeRaw);
                                                            $ref = htmlspecialchars($refRaw);
                                                            $fullName = htmlspecialchars($r['first_name'] . ' ' . $r['last_name']);
                                                            $email = htmlspecialchars($r['email']);
                                                            $passport = htmlspecialchars($r['passport_number']);
                                                            $dest = htmlspecialchars($r['destination_country']);
                                                            $entry = htmlspecialchars($r['entry_source']);
                                                            $statusText = htmlspecialchars(str_replace('_', ' ', $r['status']));
                                                            $created = htmlspecialchars($r['created_at']);
                                                            ?>
                                                            <tr
                                                                id="row-<?php echo htmlspecialchars($visaTypeRaw . '-' . $refRaw); ?>"
                                                                data-current-status="<?php echo htmlspecialchars($r['status']); ?>">
                                                                <td><?php echo $count; ?></td>

                                                                <td><span class="type-badge"><?php echo $visaType; ?></span></td>
                                                                <td><?php echo $refRaw; ?></td>
                                                                <td><?php echo $fullName; ?></td>
                                                                <td><?php echo $email; ?></td>
                                                                <td><?php echo $passport; ?></td>
                                                                <td><?php echo $dest; ?></td>
                                                                <td><?php echo $entry; ?></td>

                                                                <td>
                                                                    <span class="status-badge" style="background:<?php echo badgeColor($r['status']); ?>">
                                                                        <?php echo $statusText; ?>
                                                                    </span>
                                                                </td>

                                                                <td><?php echo $created; ?></td>

                                                                <td class="action-cell">
                                                                    <?php if ($r['status'] === 'approved') : ?>
                                                                        <span class="status-badge" style="background:#198754;">Approved</span>
                                                                    <?php elseif ($r['status'] === 'rejected') : ?>
                                                                        <span class="status-badge" style="background:#dc3545;">Declined</span>
                                                                    <?php else : ?>
                                                                        <button type="submit"
                                                                            class="action-btn btn-approve js-action <?php echo $disabled ? 'btn-disabled' : ''; ?>"
                                                                            data-action="approve"
                                                                            data-visa-type="<?php echo $visaType; ?>"
                                                                            data-ref="<?php echo $ref; ?>"
                                                                            <?php echo $disabled ? 'disabled' : ''; ?>>Approve</button>

                                                                        <button type="submit"
                                                                            class="action-btn btn-decline js-action <?php echo $disabled ? 'btn-disabled' : ''; ?>"
                                                                            data-action="decline"
                                                                            data-visa-type="<?php echo $visaType; ?>"
                                                                            data-ref="<?php echo $ref; ?>"
                                                                            <?php echo $disabled ? 'disabled' : ''; ?>>Decline</button>
                                                                    <?php endif; ?>
                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td colspan="10">No applications found.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>

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