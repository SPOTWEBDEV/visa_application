<?php  include "../server/connection.php" ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Gallery || Visanet  </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="VisaNet is a Immigration and Visa Consulting HTML Template. Created especially designed for Immigration & Visa Consulting Agencies, Visa Agents, Study Abroad Consultants, Overseas Job Consultants, IELTS Coaching Centers, and Travel & Tourism Businesses. VisaNet Immigration and Visa Consulting Design and customizable features make it perfect for on various displays and resolutions website. All HTML files are with layers and groups, so they are very easy to modify & expand." />

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
                    <h2 class="page-header__title" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Our Gallery</h2>
                    <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Our Gallery</span></li>
                    </ul><!-- /.visanet-breadcrumb list-unstyled -->
                </div><!-- /.page-header__content -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="gallery-page section-space">
            <div class="container">
                <div class="row gutter-y-30 masonry-layout">
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-1.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-1.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-2.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-2.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-3.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-3.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-4.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-4.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-8 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-5.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-5.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-8 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-6.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-6.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-7.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-7.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6">
                        <div class="gallery-page__card">
                            <img src="<?php echo $domain ?>/assets/images/gallery/gallery-1-8.jpg" alt="gallery">
                            <div class="gallery-page__card__hover">
                                <a href="<?php echo $domain ?>/assets/images/gallery/gallery-1-8.jpg" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.gallery-page section-space -->

       <?php include "../include/footer.php" ?>

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="index.php" aria-label="logo image">
                    <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="Visanet HTML" />
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
            <form role="search" method="get" class="search-popup__form" action="gallery.php#">
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
                    <img src="<?php echo $domain ?>/assets/images/logo-dark.png" width="230" alt="Visanet HTML" />
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
                <form action="gallery.php#" class="sidebar-three__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="EMAIL" id="sidebar-three-email" class="sidebar-three__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-three__newsletter__btn"><span class="far fa-envelope" aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-three__form -->
        </div><!-- /.sidebar-three__content -->
    </aside><!-- /.sidebar-three -->

    <a href="gallery.php#" data-target="html" class="scroll-to-target scroll-to-top">
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