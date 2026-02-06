<?php include "../server/connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us || <?php echo $sitename?>@gmail.com </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="<?php echo $sitename?>@gmail.comis a Immigration and Visa Consulting HTML Template. Created especially designed for Immigration & Visa Consulting Agencies, Visa Agents, Study Abroad Consultants, Overseas Job Consultants, IELTS Coaching Centers, and Travel & Tourism Businesses. <?php echo $sitename?>@gmail.comImmigration and Visa Consulting Design and customizable features make it perfect for on various displays and resolutions website. All HTML files are with layers and groups, so they are very easy to modify & expand." />

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

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo $domain ?>/assets/css/visanet.css" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

             <!-- header started -->
     <?php include("../include/nav.php")?>

       <!-- header ended -->

        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/page-header-bg.jpg);"></div><!-- /.page-header__bg -->
            <div class="page-header__shape page-header__shape--1"></div><!-- /.page-header__shape -->
            <div class="page-header__shape page-header__shape--2"></div><!-- /.page-header__shape -->
            <div class="container">
                <div class="page-header__content">
                    <h2 class="page-header__title" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Contact Us</h2>
                    <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Contact Us</span></li>
                    </ul><!-- /.visanet-breadcrumb list-unstyled -->
                </div><!-- /.page-header__content -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="contact-info contact-info--contact section-space">
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
                                <a href="mailto:<?= $site_email ?>" class="contact-info__card__link"><?= $site_email ?></a>
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
        </section><!-- /.contact-info -->

        <div class="contact-one ">
            <div class="container">
                <div class="contact-one__content">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6">
                            <div class="contact-one__form">
                                <div class="sec-title">
                                    <div class="sec-title__top" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                                        <p class="sec-title__tagline">Our Contact Us</p>
                                    </div><!-- /.sec-title__top -->
                                    <h2 class="sec-title__title bw-split-in-right">Request A Free Quote Now Get This Contact Us Visa.</h2><!-- /.sec-title__title -->
                                </div><!-- /.sec-title -->
                                <p class="contact-one__text" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Immigration visa tailored design, management & support services best in some we form, by injected humour solution.</p>
                                <form action="https://bracketweb.com/visanet-html/<?php echo $domain ?>/assets/inc/sendemail.php" class="contact-form-validated form-one" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                                    <div class="form-one__group">
                                        <div class="form-one__control">
                                            <input type="text" name="name" placeholder="Your Name *">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="tel" name="phone" placeholder="Your Phone *">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="email" name="email" placeholder="Your Email *">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <select class="selectpicker" aria-label="Default select example">
                                                <option selected>Select Service</option>
                                                <option value="1">Students Visa</option>
                                                <option value="2">Family Visa</option>
                                                <option value="3">Business Visa</option>
                                                <option value="3">Travel Visa</option>
                                                <option value="3">Working Visa</option>
                                            </select>
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <textarea name="message" placeholder="Your Comments *"></textarea>
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <button type="submit" class="visanet-btn-two">
                                                SEND REQUEST <span class="visanet-btn-two__icon"><i class="icon-arrow-right-3"></i></span>
                                            </button><!-- /.visanet-btn-two -->
                                        </div><!-- /.form-one__control -->
                                    </div><!-- /.form-one__group -->
                                </form><!-- /.form-one -->
                                <div class="result"></div><!-- /.result -->
                            </div><!-- /.contact-one__form -->
                        </div><!-- /.col-xl-7 -->
                        <div class="colxl-5 col-lg-6">
                            <div class="contact-one__image" style="background-image: url(<?php echo $domain ?>/assets/images/resources/contact-1-1.jpg);" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                                <div class="contact-one__phone">
                                    <span class="contact-one__phone__icon"><i class="icon-phone-call"></i></span>
                                    <div>
                                        <h4 class="contact-one__phone__title">Get Contact Now</h4>
                                        <a href="tel:+11234751328" class="contact-one__phone__number">+11234 751 328</a>
                                    </div>
                                </div><!-- /.contact-one__phone -->
                            </div><!-- /.contact-one__image -->
                        </div><!-- /.colxl-5 -->
                    </div><!-- /.row -->
                </div><!-- /.contact-one__content -->
            </div><!-- /.container -->
        </div><!-- /.contact-one -->

        <div class="google-map google-map__contact">
            <iframe title="template google map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="map__contact" allowfullscreen></iframe>
        </div>
        <!-- /.google-map -->

        <footer class="main-footer main-footer--five">
            <div class="main-footer__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/footer-bg.jpg);"></div>
            <div class="container">
                <div class="row gutter-y-40">
                    <div class="col-xl-3 col-lg-5 col-md-7" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="footer-widget footer-widget--about">
                            <a href="index.php" class="footer-widget__logo logo-retina">
                                <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="<?php echo $sitename?>@gmail.com">
                            </a>
                            <p class="footer-widget__text">
                                <?php echo $sitename?>@gmail.comis a modern HTML template built for immigration and visa consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
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
                                        <img src="<?php echo $domain ?>/assets/images/blog/footer-blog-1-1.jpg" alt="blog">
                                    </a>
                                    <div class="footer-widget__blog__content">
                                        <span class="footer-widget__blog__date"><span class="footer-widget__blog__icon"><i class="icon-calendar"></i></span> 10 May 2024</span>
                                        <h3 class="footer-widget__blog__title"><a href="blog-details-right.php">This Specific Issue Network Security</a></h3>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details-right.php" class="footer-widget__blog__image">
                                        <img src="<?php echo $domain ?>/assets/images/blog/footer-blog-1-2.jpg" alt="blog">
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
                            &copy; Copyright <span class="dynamic-year"></span> by <?php echo $sitename?>@gmail.comHTML Template.
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
                    <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="<?php echo $sitename?>@gmail.comHTML" />
                </a>
            </div><!-- /.logo-box -->
            <div class="mobile-nav__container"></div><!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:findox@envato.com"><?= $site_email ?></a>
                </li>
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span>
                    <a href="tel:+9156980036420">  </a>
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
            <form role="search" method="get" class="search-popup__form" action="contact.php#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit">
                    <i class="icon-search"></i>
                </button>
            </form>
        </div><!-- /.search-popup__content -->
    </div><!-- /.search-popup -->

    <a href="contact.php#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    <script src="<?php echo $domain ?>/assets/vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
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
    <!-- gsap js -->
    <script src="<?php echo $domain ?>/assets/vendors/gsap/gsap.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/scrolltrigger.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/splittext.min.js"></script>
    <script src="<?php echo $domain ?>/assets/vendors/gsap/visanet-split.js"></script>
    <!-- template js -->
    <script src="<?php echo $domain ?>/assets/js/visanet.js"></script>
</body>

</html>