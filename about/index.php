<?php include "../server/connection.php"; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Page || <?php echo $domain ?>/about/ </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $domain ?>/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $domain ?>/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $domain ?>/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo $domain ?>/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="<?php echo $domain ?>/about/is a Immigration and Visa Consulting HTML Template. Created especially designed for Immigration & Visa Consulting Agencies, Visa Agents, Study Abroad Consultants, Overseas Job Consultants, IELTS Coaching Centers, and Travel & Tourism Businesses. <?php echo $domain ?>/about/Immigration and Visa Consulting Design and customizable features make it perfect for on various displays and resolutions website. All HTML files are with layers and groups, so they are very easy to modify & expand." />

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
 
      <?php include "../include/nav.php" ?>

        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/page-header-bg.jpg);"></div><!-- /.page-header__bg -->
            <div class="page-header__shape page-header__shape--1"></div><!-- /.page-header__shape -->
            <div class="page-header__shape page-header__shape--2"></div><!-- /.page-header__shape -->
            <div class="container">
                <div class="page-header__content">
                    <h2 class="page-header__title" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">About Us</h2>
                    <ul class="visanet-breadcrumb list-unstyled" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <li><a href="index.php">Home</a></li>
                        <li><span>About</span></li>
                    </ul><!-- /.visanet-breadcrumb list-unstyled -->
                </div><!-- /.page-header__content -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="about-one section-space">
            <div class="container">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-xl-6 col-lg-5 order-1 order-lg-0" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                        <div class="about-one__experience">
                            <div class="about-one__experience__inner">
                                <h2 class="about-one__experience__year"><span style="background-image: url(<?php echo $domain ?>/assets/images/about/about-1-1.jpg);">37+</span></h2>
                            </div>
                            <h3 class="about-one__experience__title">Years Of <br> Experience</h3>
                        </div><!-- /.about-one__experience -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-xl-6 col-lg-7 order-0 order-lg-1">
                        <div class="about-one__content">
                            <div class="sec-title">
                                <div class="sec-title__top" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                                    <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                                    <p class="sec-title__tagline">Our About Company</p>
                                </div><!-- /.sec-title__top -->
                                <h2 class="sec-title__title bw-split-in-right">We Are about Expert visa Solution Trusted Immigration Company.</h2><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-one__text" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Immigration visa tailored design, management & support services building business agency elit, sed do eiusmod tempor majority have this best in some we form, by injected humour solution.</p>
                        </div><!-- /.about-one__content -->
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
                <div class="about-one__feature">
                    <div class="about-one__feature__image">
                        <div class="about-one__feature__image__inner bw-img-anim-left" style="background-image: url(<?php echo $domain ?>/assets/images/about/about-1-2.jpg);"></div>
                    </div><!-- /.about-one__feature__image -->
                    <div class="about-one__feature__box">
                        <div class="about-one__feature__item" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                            <div class="about-one__feature__bg"></div>
                            <div class="about-one__feature__icon-box"><span class="about-one__feature__icon"><i class="icon-passport"></i></span></div>
                            <div class="about-one__feature__content">
                                <h3 class="about-one__feature__title"><a href="about.php">Immigration Resources Visa</a></h3>
                                <p class="about-one__feature__text">Immigration visa tailored design, management services building sed do majority.</p>
                            </div>
                        </div><!-- /.about-one__feature__item -->
                        <div class="about-one__feature__item" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                            <div class="about-one__feature__bg"></div>
                            <div class="about-one__feature__icon-box"><span class="about-one__feature__icon"><i class="icon-luggage"></i></span></div>
                            <div class="about-one__feature__content">
                                <h3 class="about-one__feature__title"><a href="about.php">luggage bag handle location</a></h3>
                                <p class="about-one__feature__text">Immigration visa tailored design, management services building sed do majority.</p>
                            </div>
                        </div><!-- /.about-one__feature__item -->
                        <div class="about-one__feature__item" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                            <div class="about-one__feature__bg"></div>
                            <div class="about-one__feature__icon-box"><span class="about-one__feature__icon"><i class="icon-support"></i></span></div>
                            <div class="about-one__feature__content">
                                <h3 class="about-one__feature__title"><a href="about.php">24/7 Support Team Solution</a></h3>
                                <p class="about-one__feature__text">Immigration visa tailored design, management services building sed do majority.</p>
                            </div>
                        </div><!-- /.about-one__feature__item -->
                    </div><!-- /.about-one__feature__box -->
                </div><!-- /.about-one__feature -->
            </div><!-- /.container -->
        </section><!-- /.about-one -->

        <section class="visa-one section-space">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                        <p class="sec-title__tagline">Varieties of visa</p>
                        <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
                    </div><!-- /.sec-title__top -->
                    <h2 class="sec-title__title bw-split-in-right">Immigration Systems Are Increasingly <br> Dream Of Citizenship.</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="visa-one__carousel visanet-owl__carousel visanet-owl__carousel--counter visanet-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
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
					"items": 3
				}
			}
		}'>
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-1.jpg" alt="Business Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-business-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-business-visa.php">Business Visa</a></h2>
                                <p class="visa-card__text">Expand your business internationally with expert guidance, helping entrepreneurs establish and achieve success abroad.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-business-visa.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-2.jpg" alt="Quick Visa Processing">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-visa-processing"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-visa-processing.php">Quick Visa Processing</a></h2>
                                <p class="visa-card__text">Experience faster approval with our efficient visa processing service designed to simplify documentation and deliver results quickly.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-visa-processing.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-3.jpg" alt="Immigration Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-immigration-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-immigration-visa.php">Immigration Visa</a></h2>
                                <p class="visa-card__text">Access trusted immigration resources with complete guidance, reliable information, and assistance for your relocation journey.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-immigration-visa.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-4.jpg" alt="Family Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-family-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/family_visa/">Family Visa</a></h2>
                                <p class="visa-card__text">Reunite with loved ones abroad through our simplified family visa process ensuring smooth documentation and stress-free.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/family_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-5.jpg" alt="Students Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-students-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/student_visa/">Students Visa</a></h2>
                                <p class="visa-card__text">Secure your dream education overseas with expert visa guidance, university support, and documentation for global study success.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/student_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-6.jpg" alt="Travel Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-travel-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/travel_visa/">Travel Visa</a></h2>
                                <p class="visa-card__text">Enjoy hassle-free travel experiences with our reliable visa services ensuring smooth applications, approvals, and journeys.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/travel_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-1.jpg" alt="Business Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-business-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-business-visa.php">Business Visa</a></h2>
                                <p class="visa-card__text">Expand your business internationally with expert guidance, helping entrepreneurs establish and achieve success abroad.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-business-visa.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-2.jpg" alt="Quick Visa Processing">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-visa-processing"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-visa-processing.php">Quick Visa Processing</a></h2>
                                <p class="visa-card__text">Experience faster approval with our efficient visa processing service designed to simplify documentation and deliver results quickly.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-visa-processing.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-3.jpg" alt="Immigration Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-immigration-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="visa-d-immigration-visa.php">Immigration Visa</a></h2>
                                <p class="visa-card__text">Access trusted immigration resources with complete guidance, reliable information, and assistance for your relocation journey.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="visa-d-immigration-visa.php" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-4.jpg" alt="Family Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-family-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/family_visa/">Family Visa</a></h2>
                                <p class="visa-card__text">Reunite with loved ones abroad through our simplified family visa process ensuring smooth documentation and stress-free.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/family_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-5.jpg" alt="Students Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-students-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/student_visa/">Students Visa</a></h2>
                                <p class="visa-card__text">Secure your dream education overseas with expert visa guidance, university support, and documentation for global study success.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/student_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                    <div class="item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="visa-card">
                            <div class="visa-card__image bw-img-anim-left">
                                <img src="<?php echo $domain ?>/assets/images/visa/visa-1-6.jpg" alt="Travel Visa">
                                <div class="visa-card__icon-box">
                                    <span class="visa-card__icon"><i class="icon-travel-visa"></i></span>
                                </div><!-- /.visa-card__icon-box -->
                            </div><!-- /.visa-card__image -->
                            <div class="visa-card__content">
                                <h2 class="visa-card__title"><a href="<?= $domain ?>/travel_visa/">Travel Visa</a></h2>
                                <p class="visa-card__text">Enjoy hassle-free travel experiences with our reliable visa services ensuring smooth applications, approvals, and journeys.</p>
                            </div><!-- /.visa-card__content -->
                            <a href="<?= $domain ?>/travel_visa/" class="visa-card__btn">
                                Read More <span class="visa-card__btn__icon"><i class="icon-arrow-right-up"></i></span>
                            </a><!-- /.visa-card__btn -->
                        </div><!-- /.visa-card -->
                    </div><!-- /.item -->
                </div><!-- /.visa-one__carousel -->
            </div><!-- /.container -->
            <img src="<?php echo $domain ?>/assets/images/shapes/visa-shape-1-1.png" alt="visa shape" class="visa-one__shape" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
        </section><!-- /.visa-one -->

        <section class="why-choose section-space">
            <div class="container">
                <div class="row gutter-y-50">
                    <div class="col-xl-6">
                        <div class="why-choose__content">
                            <div class="sec-title">
                                <div class="sec-title__top" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                                    <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                                    <p class="sec-title__tagline">Why Choose Us</p>
                                </div><!-- /.sec-title__top -->
                                <h2 class="sec-title__title bw-split-in-right">Our Experienced Consultants Global <br> Immigration Laws And Provide.</h2><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="why-choose__text" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">Immigration visa tailored design, management & support services building <br> business agency elit, sed do eiusmod tempor majority have this best <br> in some we form, by injected humour solution.</p>
                            <div class="why-choose__list">
                                <div class="why-choose__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                                    <div class="why-choose__item__icon-box">
                                        <span class="why-choose__item__icon"><i class="icon-brainstorming"></i></span>
                                    </div>
                                    <div class="why-choose__item__content">
                                        <h3 class="why-choose__item__title">Consultancy</h3>
                                        <p class="why-choose__item__text">Worldwide Trade This Solution.</p>
                                    </div>
                                </div><!-- /.why-choose__item -->
                                <div class="why-choose__item active" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                                    <div class="why-choose__item__icon-box">
                                        <span class="why-choose__item__icon"><i class="icon-immigration"></i></span>
                                    </div>
                                    <div class="why-choose__item__content">
                                        <h3 class="why-choose__item__title">Immigration</h3>
                                        <p class="why-choose__item__text">Worldwide Trade This Solution.</p>
                                    </div>
                                </div><!-- /.why-choose__item -->
                                <div class="why-choose__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                                    <div class="why-choose__item__icon-box">
                                        <span class="why-choose__item__icon"><i class="icon-supportive"></i></span>
                                    </div>
                                    <div class="why-choose__item__content">
                                        <h3 class="why-choose__item__title">Facilitation</h3>
                                        <p class="why-choose__item__text">Worldwide Trade This Solution.</p>
                                    </div>
                                </div><!-- /.why-choose__item -->
                            </div><!-- /.why-choose__list -->
                            <p class="why-choose__text why-choose__text--2" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">The majority have suffered alteration in some form, <span>by injected this humour,</span> or randomised words visa.</p>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                                <a href="about.php" class="visanet-btn">
                                    <span class="visanet-btn__icon-box">
                                        <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                    </span>
                                    <span class="visanet-btn__text">Learn More</span>
                                </a><!-- /.visanet-btn -->
                            </div>
                        </div><!-- /.why-choose__content -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-xl-6">
                        <div class="why-choose__image">
                            <div class="why-choose__image__inner bw-img-anim-right" style="background-image: url(<?php echo $domain ?>/assets/images/resources/why-choose-1-1.jpg);"></div>
                            <div class="why-choose__box" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1300">
                                <img src="<?php echo $domain ?>/assets/images/resources/why-choose-1-2.jpg" alt="why choose" class="why-choose__box__image">
                                <div class="why-choose__box__inner">
                                    <p class="why-choose__box__text">Choose Our America’s Leading Visa & Immigration lawyers with Best service solution.</p>
                                </div>
                            </div><!-- /.why-choose__box -->
                        </div><!-- /.why-choose__image -->
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.why-choose -->

        <section class="fly-one section-space-t">
            <div class="fly-one__bg" style="background-image: url(<?php echo $domain ?>/assets/images/backgrounds/fly-bg.jpg);"></div>
            <div class="container">
                <div class="fly-one__content">
                    <div class="fly-one__client">
                        <div class="fly-one__client__images">
                            <div class="fly-one__client__img">
                                <img src="<?php echo $domain ?>/assets/images/resources/fly-client-1.png" alt="Trusted Customer">
                            </div>
                            <div class="fly-one__client__img">
                                <img src="<?php echo $domain ?>/assets/images/resources/fly-client-2.png" alt="Trusted Customer">
                            </div>
                            <div class="fly-one__client__img">
                                <img src="<?php echo $domain ?>/assets/images/resources/fly-client-3.png" alt="Trusted Customer">
                            </div>
                        </div>
                        <h3 class="fly-one__client__funfact count-box">
                            <span class="count-text" data-stop="10" data-speed="1500"></span>
                            <span>M+</span>
                        </h3>
                        <h4 class="fly-one__client__title">Trusted Customer</h4>
                    </div><!-- /.fly-one__client -->
                    <div class="fly-one__card">
                        <div class="fly-one__card__inner">
                            <h3 class="fly-one__card__title">Ready to fly with us your dream country.</h3>
                            <p class="fly-one__card__text">Immigration visa design support this services business agency elit, sed to do eiusmod tempor majority have humour visa solution.</p>
                            <a href="about.php" class="visanet-btn">
                                <span class="visanet-btn__icon-box">
                                    <span class="visanet-btn__icon"><span><i class="icon-arrow-right-3"></i></span></span>
                                </span>
                                <span class="visanet-btn__text">Read More</span>
                            </a><!-- /.visanet-btn -->
                        </div>
                        <div class="fly-one__card__image">
                            <img src="<?php echo $domain ?>/assets/images/resources/fly-img.jpg" alt="fly image">
                        </div>
                    </div><!-- /.fly-one__card -->
                </div><!-- /.fly-one__content -->
            </div><!-- /.container -->
            <img src="<?php echo $domain ?>/assets/images/shapes/fly-shape-1-1.png" alt="fly shape" class="fly-one__shape-1 airplane-animated">
            <div class="fly-one__shape-2"></div>
        </section><!-- /.fly-one -->

        <section class="countries-three countries-three--about section-space-b">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <div class="sec-title__top" data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">
                        <span class="sec-title__icon sec-title__icon--left"><i class="icon-airplane"></i></span>
                        <p class="sec-title__tagline">Countries We Offer</p>
                        <span class="sec-title__icon sec-title__icon--right"><i class="icon-airplane-2"></i></span>
                    </div><!-- /.sec-title__top -->
                    <h2 class="sec-title__title bw-split-in-right">We Provide Expert Immigration And <br> Visa Consulting Destinations.</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="countries-three__carousel visanet-owl__carousel visanet-owl__carousel--counter visanet-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
			"smartSpeed": 700,
			"nav": true,
			"dots": false,
			"autoplay": true,
            "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"],
			"responsive": {
				"0": {
					"items": 1
				},
				"576": {
					"items": 2
				},
				"992": {
					"items": 3
				},
				"1200": {
					"items": 4
				},
				"1400": {
					"items": 5
				}
			}
		}'>
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-1.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/us.png" alt="United States">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">United States</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-2.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/germany.png" alt="Germany">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Germany</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-3.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/portugal.png" alt="Portugal">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Portugal</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="400">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-4.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/argentina.png" alt="Argentina">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Argentina</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="500">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-5.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/uk.png" alt="United Kingdom">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">United Kingdom</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="100">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-1.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/us.png" alt="United States">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">United States</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="200">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-2.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/germany.png" alt="Germany">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Germany</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="300">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-3.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/portugal.png" alt="Portugal">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Portugal</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="400">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-4.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/argentina.png" alt="Argentina">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">Argentina</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                    <div class="countries-three__card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1300" data-aos-delay="500">
                        <div class="countries-three__image">
                            <img src="<?php echo $domain ?>/assets/images/countries/countries-3-5.jpg" alt="countries" class="countries-three__img">
                            <div class="countries-three__flag">
                                <img src="<?php echo $domain ?>/assets/images/countries/uk.png" alt="United Kingdom">
                            </div>
                        </div>
                        <div class="countries-three__content">
                            <h3 class="countries-three__name"><a href="countries_details/">United Kingdom</a></h3>
                            <p class="countries-three__text">Most Trusted Immigration and Visa Consultant locations.</p>
                            <a href="countries_details/" class="countries-three__link">READ MORE <span class="countries-three__link__icon"><i class="icon-arrow-right-up"></i></span></a>
                        </div>
                    </div><!-- /.countries-three__card -->
                </div><!-- /.countries-three__carousel -->
            </div><!-- /.container -->
        </section><!-- /.countries-three -->

        <section class="slide-text">
            <div class="container-fluid bw-img-anim-left">
                <h1 class="slide-text__scroll">
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Immigration
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        VISA PROCESSING
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        24/7 Support
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        VISA Consulting
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Passport
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Students visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Family Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Business Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Travel Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Working Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Visa Management
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Immigration
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        VISA PROCESSING
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        24/7 Support
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        VISA Consulting
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Passport
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Students visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Family Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Business Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Travel Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Working Visa
                    </span>
                    <span class="slide-text__group">
                        <span class="slide-text__shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape.png" alt="shape">
                            <img src="<?php echo $domain ?>/assets/images/shapes/slide-text-shape-hover.png" alt="shape">
                        </span>
                        Visa Management
                    </span>
                </h1><!-- /.slide-text__scroll -->
            </div><!-- /.container-fluid -->
        </section><!-- /.slide-text -->

      

        <?php include ".../include/footer.php" ?>
    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="index.php" aria-label="logo image">
                    <img src="<?php echo $domain ?>/assets/images/logo-light.png" width="230" alt="<?php echo $domain ?>/about/HTML" />
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
            <form role="search" method="get" class="search-popup__form" action="about.php#">
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
                    <img src="<?php echo $domain ?>/assets/images/logo-dark.png" width="230" alt="<?php echo $domain ?>/about/HTML" />
                </a>
            </div><!-- /.sidebar-three__logo -->
            <div class="sidebar-three__about sidebar-three__item">
                <p class="sidebar-three__about__text">
                    <?php echo $domain ?>/about/is a modern HTML template built for immigration and visa consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
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
                <form action="about.php#" class="sidebar-three__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="EMAIL" id="sidebar-three-email" class="sidebar-three__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-three__newsletter__btn"><span class="far fa-envelope" aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-three__form -->
        </div><!-- /.sidebar-three__content -->
    </aside><!-- /.sidebar-three -->

    <a href="about.php#" data-target="html" class="scroll-to-target scroll-to-top">
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