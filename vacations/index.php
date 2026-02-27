<?php

include("../server/connection.php");


$features = [

    [
        "title" => "Dubai, United Arab Emirates",
        "link"  => "/about/",
        "image" => "1.webp",
        "icon"  => "icon-passport", // first icon
        "text"  => "Dubai is a city and emirate in the United Arab Emirates known for its modern architecture, luxury shopping, and vibrant nightlife. It's a perfect destination for relaxation and adventure, with world-class resorts, desert safaris, and cultural attractions."
    ],
    [
        "title" => " London, United Kingdom",
        "link"  => "/about/",
        "image" => "3.webp",
        "icon"  => "icon-visa-processing", // second icon
        "text"  => "London is the capital and largest city of England and the United Kingdom. It is known for its rich history, iconic landmarks like Big Ben and the Tower of London, world-class museums, and vibrant cultural scene."
    ],
    [
        "title" => "Cancun, Mexico",
        "link"  => "/about/",
        "image" => "4.webp",
        "icon"  => "icon-passport", // you can change this anytime
        "text"  => "Cancun is a resort city in Mexico known for its beautiful beaches, crystal-clear waters, and vibrant nightlife. It's a perfect destination for relaxation and adventure, with world-class resorts, water sports, and cultural attractions."
    ],



    [
        "title" => "Bali, Indonesia",
        "link"  => "/about/",
        "image" => "5.webp",
        "icon"  => "icon-passport", // first icon
        "text"  => "Bali is a tropical paradise known for its stunning beaches, vibrant culture, and lush landscapes. It's a perfect destination for relaxation and adventure, with world-class surfing spots, ancient temples, and traditional markets."
    ],
    [
        "title" => "Crete, Greece",
        "link"  => "/about/",
        "image" => "6.webp",
        "icon"  => "icon-visa-processing", // second icon
        "text"  => "Crete is the largest Greek island and is known for its beautiful beaches, rich history, and vibrant culture. The island offers a perfect blend of relaxation and adventure, with ancient ruins, traditional villages, and stunning landscapes."
    ],
    [
        "title" => "Rome, Italy",
        "link"  => "/about/",
        "image" => "7.webp",
        "icon"  => "icon-passport", // you can change this anytime
        "text"  => "This beautiful resort town is the oldest and most popular in Egypt. Hurghada is known for its amazing Red Sea world of coral and fish life, making it the perfect destination for water sports fans."
    ],


    [
        "title" => "Cabo San Lucas, Mexico",
        "link"  => "/about/",
        "image" => "8.jpeg",
        "icon"  => "icon-passport", // first icon
        "text"  => "Cabo San Lucas is definitely for those who like to travel in luxury. Beautiful sandy beaches, award-winning restaurants, all-year sunny weather, and more are why Mexico is the top destination of 2022. "
    ],
    [
        "title" => "Istanbul, Turkey",
        "link"  => "/about/",
        "image" => "9.jpeg",
        "icon"  => "icon-visa-processing", // second icon
        "text"  => "Istanbul is the place for history enthusiasts. From its breathtaking architecture, traditions, and culture, the city showcases the influence of its unique location at the crossroads of two continents."
    ],
    [
        "title" => "Hurghada, Egypt",
        "link"  => "/about/",
        "image" => "10.jpeg",
        "icon"  => "icon-passport", // you can change this anytime
        "text"  => "This beautiful resort town is the oldest and most popular in Egypt. Hurghada is known for its amazing Red Sea world of coral and fish life, making it the perfect destination for water sports fans."
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Top Vacation Destinations || <?php echo $sitename ?></title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Explore the best vacation destinations around the world with our curated list of top travel spots. Find inspiration for your next adventure." />

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


    <!-- /.preloader -->
    <div class="page-wrapper">
        <!-- header started -->
        <?php include("../include/nav.php") ?>

        <!-- header ended -->



        <section class="features mt-5">
            <div class="container">
                <div class="features__bg"></div>
                <div class="row gutter-y-30">

                    <?php foreach ($features as $index => $feature): ?>

                        <?php
                        $country = trim($feature['title']);
                        $applyUrl = $domain . "/apply_now/?visa_type=vacation&country=" . urlencode($country) . "&from=vacation_page";
                        ?>

                        <div class="col-xl-4 col-md-6"
                            data-aos="fade-up"
                            data-aos-anchor-placement="top-bottom"
                            data-aos-duration="1300"
                            data-aos-delay="<?php echo 100 * ($index + 1); ?>">

                            <div class="features__card">
                                <div class="features__image">
                                    <img src="<?php echo $domain; ?>/assets/images/vacations/<?php echo $feature['image']; ?>" alt="features">
                                </div>

                                <div class="features__content">
                                    <div class="features__icon-box">
                                        <span class="features__icon">
                                            <i class="<?php echo $feature['icon']; ?>"></i>
                                        </span>
                                    </div>

                                    <h2 class="features__title">
                                        <a href="<?php echo $applyUrl; ?>">
                                            <?php echo $feature['title']; ?>
                                        </a>
                                    </h2>

                                    <p class="features__text">
                                        <?php echo $feature['text']; ?>
                                    </p>

                                    <a href="<?php echo $applyUrl; ?>" class="features__btn">
                                        Apply Now
                                        <span class="features__btn__icon">
                                            <i class="icon-arrow-right-up"></i>
                                        </span>
                                    </a>
                                </div>

                                <img src="<?php echo $domain; ?>/assets/images/shapes/features-shape-1-1.png"
                                    alt="shape"
                                    class="features__shape">
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>





        <?php include("../include/footer.php") ?>
    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="index.php" aria-label="logo image">
                    <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="<?php echo $sitename ?> HTML" />
                </a>
            </div><!-- /.logo-box -->
            <div class="mobile-nav__container"></div><!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:findox@envato.com"><?php echo $domain ?>@envato.com</a>
                </li>
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-phone-alt"></i></span>
                    <a href="tel:+9156980036420"> </a>
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
            <form role="search" method="get" class="search-popup__form" action="index.php#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit">
                    <i class="icon-search"></i>
                </button>
            </form>
        </div><!-- /.search-popup__content -->
    </div><!-- /.search-popup -->

    <a href="index.php#" data-target="html" class="scroll-to-target scroll-to-top">
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