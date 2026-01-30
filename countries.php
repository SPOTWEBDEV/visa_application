<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Countries Page || Visanet </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="VisaNet is a Immigration and Visa Consulting HTML Template. Created especially designed for Immigration & Visa Consulting Agencies, Visa Agents, Study Abroad Consultants, Overseas Job Consultants, IELTS Coaching Centers, and Travel & Tourism Businesses. VisaNet Immigration and Visa Consulting Design and customizable features make it perfect for on various displays and resolutions website. All HTML files are with layers and groups, so they are very easy to modify & expand." />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/aos/css/aos.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/visanet-icons/style.css" />
    <link rel="stylesheet" href="assets/vendors/daterangepicker-master/daterangepicker.css" />
    <link rel="stylesheet" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/visanet.css" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar">
            <div class="container">
                <div class="topbar__inner">
                    <div class="topbar__social">
                        <p class="topbar__social__title">Follow us:</p>
                        <div class="social-links">
                            <a href="https://facebook.com">
                                <span class="social-links__icon">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    <span class="sr-only">Facebook</span>
                                </span>
                            </a>
                            <a href="https://x.com">
                                <span class="social-links__icon">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                    <span class="sr-only">X</span>
                                </span>
                            </a>
                            <a href="https://linkedin.com">
                                <span class="social-links__icon">
                                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    <span class="sr-only">Linkedin</span>
                                </span>
                            </a>
                            <a href="https://instagram.com">
                                <span class="social-links__icon">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                    <span class="sr-only">Instagram</span>
                                </span>
                            </a>
                        </div><!-- /.social-links -->
                    </div><!-- /.topbar__social -->
                    <div class="topbar__right">
                        <ul class="topbar__info list-unstyled">
                            <li>
                                <span class="topbar__info__icon"><i class="icon-email"></i></span>
                                <span><a href="mailto:visanet@envato.com">visanet@envato.com</a></span>
                            </li>
                            <li>
                                <span class="topbar__info__icon"><i class="icon-location"></i></span>
                                <span><a href="https://www.google.com/maps">25/09 Mozilla Golden Street</a></span>
                            </li>
                        </ul><!-- /.topbar__info -->
                        <div class="topbar__language">
                            <img src="assets/images/shapes/flag-1-1.png" alt="flag">
                            <label class="sr-only" for="language-select-header">select language</label>
                            <select class="selectpicker" id="language-select-header">
                                <option value="english">English</option>
                                <option value="arabic">Arabic</option>
                            </select>
                        </div><!-- /.topbar__language -->
                    </div><!-- /.topbar__right -->
                </div><!-- /.topbar__inner -->
            </div><!-- /.container -->
        </div><!-- /.topbar -->
        <!-- header started -->
        <?php include("./include/nav.php") ?>

        <!-- header ended -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);"></div><!-- /.page-header__bg -->
            <div class="page-header__shape page-header__shape--1"></div><!-- /.page-header__shape -->
            <div class="page-header__shape page-header__shape--2"></div><!-- /.page-header__shape -->
            <div class="container">
                <div class="page-header__content">
                    <h2 class="page-header__title" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Countries Page</h2>
                    <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <li><a href="index.php">Home</a></li>
                        <li><span>countries</span></li>
                    </ul><!-- /.visanet-breadcrumb list-unstyled -->
                </div><!-- /.page-header__content -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="countries-two section-space">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                        <p class="sec-title__tagline">Countries We Offer</p>
                        <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
                    </div><!-- /.sec-title__top -->
                    <h2 class="sec-title__title bw-split-in-right">We Provide Expert Immigration And <br> Visa Consulting Destinations.</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="row gutter-y-30">
                    <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="countries-two__card">
                            <div class="row gutter-y-25 align-items-center">
                                <div class="col-lg-5">
                                    <div class="countries-two__left">
                                        <div class="countries-two__left__left">
                                            <img src="assets/images/countries/us.png" alt="US Flag" class="countries-two__flag">
                                            <p class="countries-two__label">Immigrate <br> To</p>
                                        </div><!-- /.countries-two__left__left -->
                                        <h3 class="countries-two__name"><a href="countries-details.php">United States</a></h3>
                                    </div><!-- /.countries-two__left -->
                                </div><!-- /.col-lg-5 -->
                                <div class="col-lg-7">
                                    <div class="countries-two__right">
                                        <ul class="countries-two__feature list-unstyled">
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 4 Years Business Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Visa Apply Online</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Student Admission Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 24/7 Support</li>
                                        </ul><!-- /.countries-two__feature -->
                                        <div class="countries-two__button">
                                            <a href="countries-details.php" class="visanet-btn visanet-btn--black">
                                                <span class="visanet-btn__icon-box">
                                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                                </span>
                                                <span class="visanet-btn__text">See More</span>
                                            </a><!-- /.visanet-btn -->
                                        </div><!-- /.countries-two__button -->
                                    </div><!-- /.countries-two__right -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.countries-two__card -->
                    </div><!-- /.col-12 -->
                    <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="countries-two__card">
                            <div class="row gutter-y-25 align-items-center">
                                <div class="col-lg-5">
                                    <div class="countries-two__left">
                                        <div class="countries-two__left__left">
                                            <img src="assets/images/countries/uk.png" alt="UK Flag" class="countries-two__flag">
                                            <p class="countries-two__label">Immigrate <br> To</p>
                                        </div><!-- /.countries-two__left__left -->
                                        <h3 class="countries-two__name"><a href="countries-details.php">United Kingdom</a></h3>
                                    </div><!-- /.countries-two__left -->
                                </div><!-- /.col-lg-5 -->
                                <div class="col-lg-7">
                                    <div class="countries-two__right">
                                        <ul class="countries-two__feature list-unstyled">
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 4 Years Business Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Visa Apply Online</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Student Admission Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 24/7 Support</li>
                                        </ul><!-- /.countries-two__feature -->
                                        <div class="countries-two__button">
                                            <a href="countries-details.php" class="visanet-btn visanet-btn--black">
                                                <span class="visanet-btn__icon-box">
                                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                                </span>
                                                <span class="visanet-btn__text">See More</span>
                                            </a><!-- /.visanet-btn -->
                                        </div><!-- /.countries-two__button -->
                                    </div><!-- /.countries-two__right -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.countries-two__card -->
                    </div><!-- /.col-12 -->
                    <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="countries-two__card">
                            <div class="row gutter-y-25 align-items-center">
                                <div class="col-lg-5">
                                    <div class="countries-two__left">
                                        <div class="countries-two__left__left">
                                            <img src="assets/images/countries/germany.png" alt="Germany Flag" class="countries-two__flag">
                                            <p class="countries-two__label">Immigrate <br> To</p>
                                        </div><!-- /.countries-two__left__left -->
                                        <h3 class="countries-two__name"><a href="countries-details.php">Germany</a></h3>
                                    </div><!-- /.countries-two__left -->
                                </div><!-- /.col-lg-5 -->
                                <div class="col-lg-7">
                                    <div class="countries-two__right">
                                        <ul class="countries-two__feature list-unstyled">
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 4 Years Business Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Visa Apply Online</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Student Admission Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 24/7 Support</li>
                                        </ul><!-- /.countries-two__feature -->
                                        <div class="countries-two__button">
                                            <a href="countries-details.php" class="visanet-btn visanet-btn--black">
                                                <span class="visanet-btn__icon-box">
                                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                                </span>
                                                <span class="visanet-btn__text">See More</span>
                                            </a><!-- /.visanet-btn -->
                                        </div><!-- /.countries-two__button -->
                                    </div><!-- /.countries-two__right -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.countries-two__card -->
                    </div><!-- /.col-12 -->
                    <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="countries-two__card">
                            <div class="row gutter-y-25 align-items-center">
                                <div class="col-lg-5">
                                    <div class="countries-two__left">
                                        <div class="countries-two__left__left">
                                            <img src="assets/images/countries/portugal.png" alt="Portugal Flag" class="countries-two__flag">
                                            <p class="countries-two__label">Immigrate <br> To</p>
                                        </div><!-- /.countries-two__left__left -->
                                        <h3 class="countries-two__name"><a href="countries-details.php">Portugal</a></h3>
                                    </div><!-- /.countries-two__left -->
                                </div><!-- /.col-lg-5 -->
                                <div class="col-lg-7">
                                    <div class="countries-two__right">
                                        <ul class="countries-two__feature list-unstyled">
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 4 Years Business Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Visa Apply Online</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Student Admission Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 24/7 Support</li>
                                        </ul><!-- /.countries-two__feature -->
                                        <div class="countries-two__button">
                                            <a href="countries-details.php" class="visanet-btn visanet-btn--black">
                                                <span class="visanet-btn__icon-box">
                                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                                </span>
                                                <span class="visanet-btn__text">See More</span>
                                            </a><!-- /.visanet-btn -->
                                        </div><!-- /.countries-two__button -->
                                    </div><!-- /.countries-two__right -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.countries-two__card -->
                    </div><!-- /.col-12 -->
                    <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="countries-two__card">
                            <div class="row gutter-y-25 align-items-center">
                                <div class="col-lg-5">
                                    <div class="countries-two__left">
                                        <div class="countries-two__left__left">
                                            <img src="assets/images/countries/argentina.png" alt="Argentina Flag" class="countries-two__flag">
                                            <p class="countries-two__label">Immigrate <br> To</p>
                                        </div><!-- /.countries-two__left__left -->
                                        <h3 class="countries-two__name"><a href="countries-details.php">Argentina</a></h3>
                                    </div><!-- /.countries-two__left -->
                                </div><!-- /.col-lg-5 -->
                                <div class="col-lg-7">
                                    <div class="countries-two__right">
                                        <ul class="countries-two__feature list-unstyled">
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 4 Years Business Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Visa Apply Online</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> Student Admission Visa</li>
                                            <li><span class="countries-two__feature__icon"><i class="icon-checked"></i></span> 24/7 Support</li>
                                        </ul><!-- /.countries-two__feature -->
                                        <div class="countries-two__button">
                                            <a href="countries-details.php" class="visanet-btn visanet-btn--black">
                                                <span class="visanet-btn__icon-box">
                                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                                </span>
                                                <span class="visanet-btn__text">See More</span>
                                            </a><!-- /.visanet-btn -->
                                        </div><!-- /.countries-two__button -->
                                    </div><!-- /.countries-two__right -->
                                </div><!-- /.col-lg-7 -->
                            </div><!-- /.row -->
                        </div><!-- /.countries-two__card -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.countries-two -->

        <footer class="main-footer section-space-t">
            <div class="main-footer__bg" style="background-image: url(assets/images/backgrounds/footer-bg.jpg);"></div>
            <div class="main-footer__top">
                <div class="contact-info">
                    <div class="container">
                        <div class="contact-info__carousel visanet-owl__carousel visanet-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
        "items": 1,
        "margin": 30,
        "loop": false,
        "smartSpeed": 700,
        "nav": true,
        "dots": false,
        "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
        "autoplay": true,
        "responsive": {
            "0": {
                "items": 1
            },
            "768": {
                "items": 2
            },
            "992": {
                "items": 2
            },
            "1200": {
                "items": 3
            }
        }
    }'>
                            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                                <div class="contact-info__card">
                                    <div class="contact-info__card__icon">
                                        <i class="icon-phone-call"></i>
                                    </div><!-- /.contact-info__card__icon -->
                                    <div class="contact-info__card__content">
                                        <h3 class="contact-info__card__title">Get Contact Phone</h3>
                                        <a href="tel:+55222555255" class="contact-info__card__link">+55 222 555 255</a>
                                    </div><!-- /.contact-info__card__content -->
                                </div><!-- /.contact-info__card -->
                            </div><!-- /.item -->
                            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                                <div class="contact-info__card">
                                    <div class="contact-info__card__icon">
                                        <i class="icon-email-2"></i>
                                    </div><!-- /.contact-info__card__icon -->
                                    <div class="contact-info__card__content">
                                        <h3 class="contact-info__card__title">Your Email Address</h3>
                                        <a href="mailto:visanet@envato.com" class="contact-info__card__link">visanet@envato.com</a>
                                    </div><!-- /.contact-info__card__content -->
                                </div><!-- /.contact-info__card -->
                            </div><!-- /.item -->
                            <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                                <div class="contact-info__card">
                                    <div class="contact-info__card__icon">
                                        <i class="icon-location-2"></i>
                                    </div><!-- /.contact-info__card__icon -->
                                    <div class="contact-info__card__content">
                                        <h3 class="contact-info__card__title">Your Location</h3>
                                        <a href="https://www.google.com/maps" class="contact-info__card__link">15/04 Street Australia</a>
                                    </div><!-- /.contact-info__card__content -->
                                </div><!-- /.contact-info__card -->
                            </div><!-- /.item -->
                        </div><!-- /.contact-info__carousel -->
                    </div><!-- /.container -->
                </div><!-- /.contact-info -->
            </div><!-- /.main-footer__top -->
            <div class="container">
                <div class="row gutter-y-40">
                    <div class="col-xl-3 col-lg-5 col-md-7" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="footer-widget footer-widget--about">
                            <a href="index.php" class="footer-widget__logo logo-retina">
                                <img src="assets/images/logo-light.png" width="230" alt="Visanet HTML Template">
                            </a>
                            <p class="footer-widget__text">
                                VisaNet is a modern HTML template built for immigration and visa consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
                            </p>
                            <div class="social-links">
                                <a href="https://facebook.com">
                                    <span class="social-links__icon">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </span>
                                </a>
                                <a href="https://x.com">
                                    <span class="social-links__icon">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">X</span>
                                    </span>
                                </a>
                                <a href="https://linkedin.com">
                                    <span class="social-links__icon">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                        <span class="sr-only">Linkedin</span>
                                    </span>
                                </a>
                                <a href="https://instagram.com">
                                    <span class="social-links__icon">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </span>
                                </a>
                            </div><!-- /.social-links -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-xl-3 -->
                    <div class="col-lg-3 col-md-5 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="footer-widget footer-widget--links">
                            <h2 class="footer-widget__title">Quick Link</h2><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__links">
                                <li><a href="about.php">What We Do</a></li>
                                <li><a href="about.php">About Company</a></li>
                                <li><a href="team.php">Team Member</a></li>
                                <li><a href="gallery.php">Our Gallery</a></li>
                                <li><a href="about.php">Watch Video</a></li>
                                <li><a href="blog-grid-right.php">Latest news</a></li>
                            </ul><!-- /.footer-widget__links -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="footer-widget footer-widget--blog">
                            <h2 class="footer-widget__title">Recent Blog</h2><!-- /.footer-widget__title -->
                            <ul class="footer-widget__blog list-unstyled">
                                <li>
                                    <a href="blog-details-right.php" class="footer-widget__blog__image">
                                        <img src="assets/images/blog/footer-blog-1-1.jpg" alt="blog">
                                    </a>
                                    <div class="footer-widget__blog__content">
                                        <span class="footer-widget__blog__date"><span class="footer-widget__blog__icon"><i class="icon-calendar"></i></span> 10 May 2024</span>
                                        <h3 class="footer-widget__blog__title"><a href="blog-details-right.php">This Specific Issue Network Security</a></h3>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details-right.php" class="footer-widget__blog__image">
                                        <img src="assets/images/blog/footer-blog-1-2.jpg" alt="blog">
                                    </a>
                                    <div class="footer-widget__blog__content">
                                        <span class="footer-widget__blog__date"><span class="footer-widget__blog__icon"><i class="icon-calendar"></i></span> 23 February 2025</span>
                                        <h3 class="footer-widget__blog__title"><a href="blog-details-right.php">In up So Discovery my Middleton</a></h3>
                                    </div>
                                </li>
                            </ul><!-- /.footer-widget__blog -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-xl-3 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="400">
                        <div class="footer-widget footer-widget--schedule">
                            <h2 class="footer-widget__title">Flight Schedule</h2><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__schedule">
                                <li><span>Sunday -------</span> <span>9.00AM – 8.00PM</span></li>
                                <li><span>Monday ------</span> <span>8.30AM – 7.30PM</span></li>
                                <li><span>Tuesday ------</span> <span>6.00AM – 5.00PM</span></li>
                                <li><span>Wednesday ---</span> <span>2.00AM – 3.00PM</span></li>
                                <li><span>Thursday -----</span> <span>4.00AM – 5.00PM</span></li>
                            </ul><!-- /.footer-widget__links -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-xl-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> by Visanet HTML Template.
                        </p>
                        <ul class="main-footer__page list-unstyled">
                            <li><a href="about.php">Privacy</a></li>
                            <li><a href="about.php">Policy</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul><!-- /.main-footer__page -->
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="index.php" aria-label="logo image">
                    <img src="assets/images/logo-light.png" width="230" alt="Visanet HTML" />
                </a>
            </div><!-- /.logo-box -->
            <div class="mobile-nav__container"></div><!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:findox@envato.com">visanet@envato.com</a>
                </li>
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span>
                    <a href="tel:+9156980036420">+91 5698 0036 420</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="social-links">
                <a href="https://facebook.com">
                    <span class="social-links__icon">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </span>
                </a>
                <a href="https://x.com">
                    <span class="social-links__icon">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">X</span>
                    </span>
                </a>
                <a href="https://linkedin.com">
                    <span class="social-links__icon">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        <span class="sr-only">Linkedin</span>
                    </span>
                </a>
                <a href="https://instagram.com">
                    <span class="social-links__icon">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </span>
                </a>
            </div><!-- /.social-links -->
        </div><!-- /.mobile-nav__content -->
    </div><!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="countries.php#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit">
                    <i class="icon-search"></i>
                </button>
            </form>
        </div><!-- /.search-popup__content -->
    </div><!-- /.search-popup -->
    <aside class="sidebar-three">
        <div class="sidebar-three__overlay sidebar-btn__toggler"></div><!-- /.siderbar-ovarlay -->
        <div class="sidebar-three__content">
            <span class="sidebar-three__close sidebar-btn__toggler"><i class="icon-close"></i></span>
            <div class="sidebar-three__logo sidebar-three__item logo-retina">
                <a href="index.php" aria-label="logo image">
                    <img src="assets/images/logo-dark.png" width="230" alt="Visanet HTML" />
                </a>
            </div><!-- /.sidebar-three__logo -->
            <div class="sidebar-three__about sidebar-three__item">
                <p class="sidebar-three__about__text">
                    VisaNet is a modern HTML template built for immigration and visa consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
                </p>
            </div><!-- /.sidebar-three__about -->
            <div class="sidebar-three__info sidebar-three__item">
                <h4 class="sidebar-three__title">Contact Us</h4>
                <ul class="sidebar-three__info__list">
                    <li>
                        <span class="sidebar-three__info__icon">
                            <i class="icon-location"></i>
                        </span>
                        <address>85 Ketch Harbour Road Bensal
                            PA 19020</address>
                    </li>
                    <li>
                        <span class="sidebar-three__info__icon">
                            <i class="icon-email"></i>
                        </span>
                        <a href="mailto:visanet@envato.com">visanet@envato.com</a>
                    </li>
                    <li>
                        <span class="sidebar-three__info__icon">
                            <i class="icon-phone-call"></i>
                        </span>
                        <a href="tel:+9156980036420">+9156980036420</a>
                    </li>
                </ul><!-- /.sidebar-three__info__list -->
            </div><!-- /.sidebar-three__info -->
            <div class="sidebar-three__social social-links sidebar-three__item">
                <a href="https://facebook.com">
                    <span class="social-links__icon">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </span>
                </a>
                <a href="https://x.com">
                    <span class="social-links__icon">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">X</span>
                    </span>
                </a>
                <a href="https://linkedin.com">
                    <span class="social-links__icon">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        <span class="sr-only">Linkedin</span>
                    </span>
                </a>
                <a href="https://instagram.com">
                    <span class="social-links__icon">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </span>
                </a>
            </div><!-- /.sidebar-three__social -->
            <div class="sidebar-three__newsletter sidebar-three__item">
                <label class="sidebar-three__title" for="sidebar-three-email">Newsletter</label>
                <form action="countries.php#" class="sidebar-three__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="EMAIL" id="sidebar-three-email" class="sidebar-three__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-three__newsletter__btn"><span class="far fa-envelope" aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-three__form -->
        </div><!-- /.sidebar-three__content -->
    </aside><!-- /.sidebar-three -->

    <a href="countries.php#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    <script src="assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="assets/vendors/aos/js/aos.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/daterangepicker-master/moment.min.js"></script>
    <script src="assets/vendors/daterangepicker-master/daterangepicker.js"></script>
    <!-- gsap js -->
    <script src="assets/vendors/gsap/gsap.js"></script>
    <script src="assets/vendors/gsap/scrolltrigger.min.js"></script>
    <script src="assets/vendors/gsap/splittext.min.js"></script>
    <script src="assets/vendors/gsap/visanet-split.js"></script>
    <!-- template js -->
    <script src="assets/js/visanet.js"></script>
</body>

</html>