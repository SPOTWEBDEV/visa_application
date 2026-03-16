<?php
include "../server/connection.php";

function h($v)
{
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

/* ================= FIND APPLICATION ================= */

function find_application_by_ref(mysqli $connection, string $ref): array
{
    $tables = [
        "business_visa_applications",
        "student_visa_applications",
        "family_visa_applications",
        "travel_visa_applications",
        "immigration_visa_applications",
        "vacation_visa_applications"
    ];

    foreach ($tables as $table) {

        $stmt = $connection->prepare("
            SELECT id, application_ref, status, current_step, created_at
            FROM {$table}
            WHERE application_ref=?
            LIMIT 1
        ");

        if (!$stmt) continue;

        $stmt->bind_param("s", $ref);
        $stmt->execute();

        $row = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        if ($row) {
            return [
                "found" => true,
                "table" => $table,
                "row" => $row
            ];
        }
    }

    return ["found" => false];
}

/* ================= TRACKING ================= */

$ref_input = "";
$error_msg = "";
$app = null;

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["ref"])) {

    $ref_input = trim($_GET["ref"] ?? "");

    if ($ref_input === "") {
        $error_msg = "Please enter tracking ID";
    } else {

        $app = find_application_by_ref($connection, $ref_input);

        if (!$app["found"]) {
            $error_msg = "Tracking ID not found";
        }
    }
}

/* ================= PAYMENT INFO ================= */

$payment = null;

if ($app && $app["found"]) {

    $ref = $app["row"]["application_ref"];

    $stmt = $connection->prepare("
        SELECT *
        FROM payment
        WHERE tracking_id=?
        LIMIT 1
    ");

    $stmt->bind_param("s", $ref);
    $stmt->execute();

    $payment = $stmt->get_result()->fetch_assoc();

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Details || <?php echo $sitename ?> </title>

    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/aos/css/aos.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/visanet-icons/style.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <!-- Bootstrap Icons (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/css/visanet.css" />


</head>

<body class="custom-cursor">
    

    <?php include("../include/nav.php") ?>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/page-header-bg.jpg);"></div>
        <div class="page-header__shape page-header__shape--1"></div>
        <div class="page-header__shape page-header__shape--2"></div>
        <div class="container">
            <div class="page-header__content">
                <h2 class="page-header__title" data-aos="fade-up" data-aos-duration="1300">Payment Details</h2>
                <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="200">
                    <li><a href="<?php echo $domain ?>/">Home</a></li>
                    <li><span>APPLICATION ID</span></li>
                    <?php if ($app && $app["found"]): ?>
                        <li><span><?php echo h($ref_input) ?></span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">

            <style>
                .payment-card {
                    background: white;
                    border-radius: 18px;
                    padding: 32px;
                    box-shadow: 0 12px 40px rgba(0, 0, 0, .08);
                }

                .payment-box {
                    border-radius: 14px;
                    padding: 22px;
                    border: 1px solid rgba(0, 0, 0, .08);
                    background: #fafafa;
                }

                .payment-label {
                    font-weight: 700;
                    opacity: .75;
                    font-size: 14px;
                }

                .pay-btn {
                    width: 100%;
                    border: none;
                    padding: 14px;
                    border-radius: 12px;
                    font-weight: 800;
                    background: #111;
                    color: white;
                    transition: .3s;
                }

                .pay-btn:hover {
                    opacity: .85;
                }

                /* support floating hint */
                .support-hint {
                    position: fixed;
                    bottom: 25px;
                    right: 25px;
                    background: #111;
                    color: white;
                    padding: 14px 20px;
                    border-radius: 999px;
                    font-weight: 700;
                    font-size: 14px;
                    box-shadow: 0 8px 30px rgba(0, 0, 0, .2);
                    z-index: 999;
                }
            </style>


            <h3 class="mb-4">Application Payment Details</h3>

            <?php if (!$app || !$app["found"]): ?>

                <div class="payment-card">
                    <h5>No Application Found</h5>
                    <p>Please check tracking ID.</p>
                </div>

            <?php else: ?>

                <div class="payment-card">

                    <h5 class="mb-4">Payment Instruction</h5>

                    <?php if ($payment): ?>

                        <div class="payment-box mb-4">

                            <p class="payment-label">Payment Type</p>
                            <h6><?= strtoupper(h($payment['payment_type'])) ?></h6>

                            <hr>

                            <?php if ($payment['payment_type'] == 'bank'): ?>

                                <p class="payment-label">Bank Name</p>
                                <h6><?= h($payment['bank_name']) ?></h6>

                                <p class="payment-label mt-3">Account Number</p>
                                <h6><?= h($payment['account_number']) ?></h6>

                                <p class="payment-label mt-3">Account Name</p>
                                <h6><?= h($payment['account_name']) ?></h6>

                            <?php else: ?>

                                <p class="payment-label">Wallet Name</p>
                                <h6><?= h($payment['wallet_name']) ?></h6>

                                <p class="payment-label mt-3">Wallet Address</p>
                                <h6 style="word-break:break-all">
                                    <?= h($payment['wallet_address']) ?>
                                </h6>

                            <?php endif; ?>

                            <hr>

                            <p class="payment-label">Travel Cost</p>
                            <h4 class="text-success">$<?= h($payment['travel_cost']) ?></h4>

                        </div>

                        <button id="paidBtn" class="pay-btn">
                            ✅ I have already made payment
                        </button>

                    <?php else: ?>

                        <div class="alert alert-warning">
                            Payment information not yet configured by admin.
                        </div>

                    <?php endif; ?>

                </div>

            <?php endif; ?>


            <div class="support-hint">
                💬 Need help? Chat support on bottom right.
            </div>


        </div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.getElementById("paidBtn")?.addEventListener("click", function() {

                Swal.fire({
                    icon: "success",
                    title: "Payment Under Review",
                    text: "Please chat live support for payment verification.",
                    confirmButtonText: "OK"
                });

            });
        </script>
    </section>

    <?php include "../include/footer.php" ?>

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="<?php echo $domain ?>/" aria-label="logo image">
                    <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="<?php echo $sitename ?>" />
                </a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:<?= $site_email ?>"><?= $site_email ?></a>
                </li>
            </ul>
            <div class="social-links">
                <a href="https://facebook.com"><span class="social-links__icon"><i class="fab fa-facebook-f"></i></span></a>
                <a href="https://x.com"><span class="social-links__icon"><i class="fab fa-twitter"></i></span></a>
                <a href="https://linkedin.com"><span class="social-links__icon"><i class="fab fa-linkedin-in"></i></span></a>
                <a href="https://instagram.com"><span class="social-links__icon"><i class="fab fa-instagram"></i></span></a>
            </div>
        </div>
    </div>

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit"><i class="icon-search"></i></button>
            </form>
        </div>
    </div>

    <aside class="sidebar-three">
        <div class="sidebar-three__overlay sidebar-btn__toggler"></div>
        <div class="sidebar-three__content">
            <span class="sidebar-three__close sidebar-btn__toggler"><i class="icon-close"></i></span>
            <div class="sidebar-three__logo sidebar-three__item logo-retina">
                <a href="<?php echo $domain ?>/" aria-label="logo image">
                    <img src="<?php echo $domain ?>/assets/images/logo-dark.png" width="230" alt="<?php echo $sitename ?>" />
                </a>
            </div>
            <div class="sidebar-three__about sidebar-three__item">
                <p class="sidebar-three__about__text">
                    <?php echo $sitename ?> is a modern visa consulting website for travel, study, and immigration services.
                </p>
            </div>
            <div class="sidebar-three__info sidebar-three__item">
                <h4 class="sidebar-three__title">Contact Us</h4>
                <ul class="sidebar-three__info__list">
                    <li>
                        <span class="sidebar-three__info__icon"><i class="icon-email"></i></span>
                        <a href="mailto:<?= $site_email ?>"><?= $site_email ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    <script src="<?php echo $domain ?>/assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/bootstrap-select/bootstrap-select.min.css"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/aos/js/aos.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/isotope/isotope.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/slick/slick.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/countdown/countdown.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/daterangepicker-master/moment.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/daterangepicker-master/daterangepicker.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/gsap.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/scrolltrigger.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/splittext.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/visanet-split.js"></script>
    <script src="<?php echo $domain ?>/assets/js/visanet.js"></script>
</body>

</html>