<?php
include "../server/connection.php";

/**
 * TRACKING PAGE FLOW (as you requested)
 * 1) Show input form first (tracking ref)
 * 2) When user submits ref, search across visa tables by application_ref
 * 3) If found -> show timeline UI (like your screenshot)
 * 4) Third row = Payment row with a Pay button
 */

/* ---------------- helpers ---------------- */
function h($v)
{
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

/**
 * Find application by ref across tables (because your ref prefix decides table)
 * Tables from your submit script:
 * - business_visa_applications
 * - student_visa_applications
 * - family_visa_applications
 * - travel_visa_applications
 * - immigration_visa_applications
 */
function find_application_by_ref(mysqli $connection, string $ref): array
{
    $tables = [
        "business_visa_applications",
        "student_visa_applications",
        "family_visa_applications",
        "travel_visa_applications",
        "immigration_visa_applications"
    ];

    foreach ($tables as $table) {
        $sql = "SELECT id, application_ref, status, current_step, created_at
                FROM {$table}
                WHERE application_ref = ?
                LIMIT 1";
        $stmt = mysqli_prepare($connection, $sql);
        if (!$stmt) continue;

        mysqli_stmt_bind_param($stmt, "s", $ref);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res ? mysqli_fetch_assoc($res) : null;
        mysqli_stmt_close($stmt);

        if ($row) {
            return [
                "found" => true,
                "table" => $table,
                "row"   => $row
            ];
        }
    }

    return ["found" => false];
}

/* ---------------- read submitted ref ---------------- */
$ref_input = "";
$error_msg = "";
$app = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ref_input = trim((string)($_POST["tracking_ref"] ?? ""));
    if ($ref_input === "") {
        $error_msg = "Please enter your Tracking ID.";
    } else {
        $app = find_application_by_ref($connection, $ref_input);
        if (!$app["found"]) {
            $error_msg = "Tracking ID not found. Please check and try again.";
        }
    }
}

/* ---------------- if found, build timeline ---------------- */
$application_ref = $ref_input ?: "";
$timeline = [];

$pay_url = ""; // set your pay link here when you’re ready

if ($app && $app["found"]) {
    $row = $app["row"];

    $application_ref = $row["application_ref"];
    $status = (string)($row["status"] ?? "");
    $current_step = (int)($row["current_step"] ?? 0);
    $created_at = $row["created_at"] ?? "";

    // date label for UI (you can change)
    $date_label = $created_at ? date("d-m-Y", strtotime($created_at)) : date("d-m-Y");

    // Use Bootstrap Icons classes (bi bi-...)
    $timeline = [
        [
            "date" => $date_label,
            "title" => "Application Submitted",
            "text" => "We have received your application. Your tracking ID has been created successfully.",
            "icon" => "bi bi-send-fill"
        ],
        [
            "date" => $date_label,
            "title" => "Under Review",
            "text" => "Our team is currently reviewing your details and documents. Status: " . strtoupper($status),
            "icon" => "bi bi-search"
        ],
        [
            "date" => $date_label,
            "title" => "Payment Required",
            "text" => "To continue processing your application, please complete your payment.",
            "icon" => "bi bi-credit-card-2-front-fill",
            "is_payment" => true
        ],
        [
            "date" => $date_label,
            "title" => "Next Updates",
            "text" => "Once payment is confirmed, we will continue processing and notify you of the next steps.",
            "icon" => "bi bi-check-circle-fill"
        ],
    ];

    $pay_url = $domain . "/pay/?ref=" . urlencode($application_ref);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracking || <?php echo $sitename ?> </title>

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

    <style>
        .tracking-wrap {
            padding-top: 10px;
        }

        .tracking-head {
            background: #fff;
            border-radius: 14px;
            padding: 18px 18px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .06);
            border: 1px solid rgba(0, 0, 0, .06);
            margin-bottom: 18px;
        }

        .tracking-head__top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .tracking-ref {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(0, 0, 0, .04);
            padding: 10px 12px;
            border-radius: 999px;
            font-weight: 700;
            font-family: "Red Hat Text", sans-serif;
        }

        .tracking-ref i {
            opacity: .75;
        }

        /* form card */
        .track-form-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .06);
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .track-form-card h3 {
            margin: 0 0 6px;
            font-weight: 900;
            font-family: "Red Hat Text", sans-serif;
        }

        .track-form-card p {
            margin: 0 0 14px;
            color: rgba(0, 0, 0, .6);
        }

        .track-input {
            width: 100%;
            height: 56px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, .12);
            padding: 0 14px;
            outline: none;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .track-input:focus {
            border-color: rgba(0, 0, 0, .35);
        }

        .track-error {
            margin-top: 10px;
            color: #b00020;
            font-weight: 700;
        }

        /* timeline */
        .timeline-rail {
            position: relative;
            padding-left: 64px;
        }

        .timeline-rail:before {
            content: "";
            position: absolute;
            left: 28px;
            top: 10px;
            bottom: 10px;
            width: 3px;
            background: rgba(0, 0, 0, .12);
            border-radius: 999px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 16px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            box-shadow: 0 10px 18px rgba(0, 0, 0, .15);
            border: 3px solid #fff;
            z-index: 2;

            /* ✅ SPACE BETWEEN ICON & DATE BOX */
            margin-right: 10px;
        }

        .timeline-icon i {
            font-size: 15px;
            line-height: 1;
        }

        /* ✅ more space between icon and the date card */
        .timeline-card {
            display: grid;
            grid-template-columns: 170px 1fr;
            overflow: hidden;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 10px 22px rgba(0, 0, 0, .06);
            border: 1px solid rgba(0, 0, 0, .06);
            min-height: 86px;

            /* this creates visible gap from the icon */
            margin-left: 12px;
        }

        .timeline-date {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: rgba(255, 255, 255, .95);
            letter-spacing: .2px;
            font-family: "Red Hat Text", sans-serif;
            padding: 18px 16px;
            text-align: center;
        }

        .timeline-body {
            padding: 16px 18px;
        }

        .timeline-body h4 {
            margin: 0 0 6px;
            font-size: 16px;
            font-weight: 800;
            font-family: "Red Hat Text", sans-serif;
            line-height: 1.2;
        }

        .timeline-body p {
            margin: 0;
            font-size: 13px;
            color: rgba(0, 0, 0, .65);
            line-height: 1.55;
        }

        .pay-row {
            margin-top: 10px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .pay-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 999px;
            background: #111;
            color: #fff;
            font-weight: 800;
            border: none;
            text-decoration: none;
        }

        .pay-btn:hover {
            color: #fff;
            opacity: .92;
        }

        /* colors like screenshot */
        .timeline-item:nth-child(1) .timeline-date {
            background: #6f2dbd;
        }

        .timeline-item:nth-child(1) .timeline-icon {
            background: #6f2dbd;
        }

        .timeline-item:nth-child(2) .timeline-date {
            background: #0d6efd;
        }

        .timeline-item:nth-child(2) .timeline-icon {
            background: #0d6efd;
        }

        .timeline-item:nth-child(3) .timeline-date {
            background: #14a44d;
        }

        .timeline-item:nth-child(3) .timeline-icon {
            background: #14a44d;
        }

        .timeline-item:nth-child(4) .timeline-date {
            background: #6f2dbd;
        }

        .timeline-item:nth-child(4) .timeline-icon {
            background: #6f2dbd;
        }

        @media (max-width: 767px) {
            .timeline-rail {
                padding-left: 0;
            }

            .timeline-rail:before {
                display: none;
            }

            .timeline-icon {
                position: static;
                transform: none;
                margin-bottom: 10px;
                margin-right: 0;
            }

            .timeline-card {
                grid-template-columns: 1fr;
                margin-left: 0;
            }

            .timeline-date {
                justify-content: flex-start;
            }

            .timeline-item {
                padding: 16px;
                border-radius: 14px;
                background: rgba(0, 0, 0, .02);
            }
        }
    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <?php include("../include/nav.php") ?>

    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/page-header-bg.jpg);"></div>
        <div class="page-header__shape page-header__shape--1"></div>
        <div class="page-header__shape page-header__shape--2"></div>
        <div class="container">
            <div class="page-header__content">
                <h2 class="page-header__title" data-aos="fade-up" data-aos-duration="1300">Application Tracking</h2>
                <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="200">
                    <li><a href="<?php echo $domain ?>/">Home</a></li>
                    <li><span>Tracking</span></li>
                    <?php if ($app && $app["found"]): ?>
                        <li><span><?php echo h($application_ref) ?></span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container">
            <div class="tracking-wrap">

                <?php if (!$app || !$app["found"]): ?>
                    <!-- FIRST: SHOW INPUT FORM -->
                    <div class="track-form-card" data-aos="fade-up" data-aos-duration="1300">
                        <h3>Enter Your Tracking ID</h3>
                        <p>Paste the tracking reference you received after application submission.</p>

                        <form method="POST" action="">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-8">
                                    <input class="track-input" type="text" name="tracking_ref" value="<?php echo h($ref_input) ?>" placeholder="e.g. FAM20260214123456789" required>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" class="visanet-btn w-100">
                                        <span class="visanet-btn__icon-box">
                                            <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                        </span>
                                        <span class="visanet-btn__text">Track Now</span>
                                    </button>
                                </div>
                            </div>

                            <?php if ($error_msg): ?>
                                <div class="track-error"><?php echo h($error_msg) ?></div>
                            <?php endif; ?>
                        </form>
                    </div>

                <?php else: ?>
                    <!-- FOUND: SHOW TIMELINE -->
                    <div class="tracking-head" data-aos="fade-up" data-aos-duration="1300">
                        <div class="tracking-head__top">
                            <div>
                                <h3 style="margin:0; font-weight:900; font-family:'Red Hat Text',sans-serif;">Tracking Result</h3>
                                <p style="margin:6px 0 0; color:rgba(0,0,0,.6);">
                                    Below is your application progress timeline.
                                </p>
                            </div>

                            <div class="tracking-ref">
                                <span><?php echo h($application_ref) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-rail" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="150">
                        <?php foreach ($timeline as $t): ?>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="<?php echo h($t["icon"]) ?>"></i>
                                </div>

                                <div class="timeline-card">
                                    <div class="timeline-date">
                                        <?php echo h($t["date"]) ?>
                                    </div>

                                    <div class="timeline-body">
                                        <h4><?php echo h($t["title"]) ?></h4>
                                        <p><?php echo h($t["text"]) ?></p>

                                        <?php if (!empty($t["is_payment"])): ?>
                                            <div class="pay-row">
                                                <a class="pay-btn" href="<?php echo h($pay_url) ?>">
                                                    <i class="bi bi-shield-lock-fill"></i>
                                                    Pay Now
                                                </a>
                                                <span style="color:rgba(0,0,0,.55); font-weight:700;">
                                                    Secure payment for ref: <?php echo h($application_ref) ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div style="margin-top:16px;">
                        <a href="" class="visanet-btn">
                            <span class="visanet-btn__icon-box">
                                <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                            </span>
                            <span class="visanet-btn__text">Track Another ID</span>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
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
