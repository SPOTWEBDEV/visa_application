<?php include "../server/connection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout || <?php echo $sitename?>@gmail.com </title>
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

       <?php include "../include/nav.php" ?>


       
        <section class="checkout-page section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-page__notice">
                            <h4 class="notice-box">Have a coupon? <a href="checkout.php#">Click here to enter your code</a></h4>
                        </div><!-- /.checkout-page__notice -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <form action="checkout.php#" class="checkout-page__form">
                    <div class="row gutter-y-30">
                        <div class="col-lg-6">
                            <div class="checkout-page__billing-address">
                                <h2 class="checkout-page__title">Billing Address:</h2>
                                <div class="form-one">
                                    <div class="form-one__group">
                                        <div class="form-one__control">
                                            <input type="text" name="name" placeholder="First Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="name" placeholder="Last Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="company" placeholder="Company Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="address" placeholder="Address" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <select class="selectpicker" aria-label="Select Country">
                                                <option selected>Select Country</option>
                                                <option value="1">Bangladesh</option>
                                                <option value="2">Canada</option>
                                                <option value="3">England</option>
                                                <option value="4">Australia</option>
                                            </select>
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="city" placeholder="Town/City" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="zip-code" placeholder="Zip Code" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="tel" name="phone" placeholder="Phone Number" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="email" name="email" placeholder="Email Address" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.form-one -->
                            </div><!-- /.checkout-page__billing-address -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="checkout-page__delivery-address">
                                <h2 class="checkout-page__title">Delivery Address:</h2>
                                <div class="checkout-page__form form-one">
                                    <div class="form-one__group">
                                        <div class="form-one__control">
                                            <input type="text" name="name" placeholder="First Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="name" placeholder="Last Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="company" placeholder="Company Name" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="text" name="address" placeholder="Address" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <select class="selectpicker" aria-label="Select Country">
                                                <option selected>Select Country</option>
                                                <option value="1">Bangladesh</option>
                                                <option value="2">Canada</option>
                                                <option value="3">England</option>
                                                <option value="4">Australia</option>
                                            </select>
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="city" placeholder="Town/City" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="text" name="zip-code" placeholder="Zip Code" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control">
                                            <input type="tel" name="phone" placeholder="Phone Number" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                        <div class="form-one__control form-one__control--full">
                                            <input type="email" name="email" placeholder="Email Address" class="form-one__input">
                                        </div><!-- /.form-one__control -->
                                    </div><!-- /.form-one__group -->
                                </div><!-- /.checkout-page__form -->
                            </div><!-- /.checkout-page__delivery-address -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-12">
                            <div class="checkout-page__shipping-details">
                                <h2 class="checkout-page__title">Shipping Details</h2>
                                <div class="checkout-page__check-box">
                                    <input type="checkbox" name="skipper4" id="skipper4" checked="">
                                    <label for="skipper4">Same as Billing Details<span></span></label>
                                </div>
                            </div><!-- /.checkout-page__shipping-details -->
                        </div><!-- /.col-12 -->
                    </div><!-- /.row gutter-y-30 -->
                    <div class="checkout-page__your-order">
                        <h2 class="checkout-page__title">Your order</h2>
                        <div class="row gutter-y-20">
                            <div class="col-xl-6 col-lg-6">
                                <table class="checkout-page__order-table">
                                    <thead class="checkout-page__order-table-head">
                                        <tr>
                                            <th>Product</th>
                                            <th class="right">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pro__title">Product Name</td>
                                            <td class="pro__price">$10.33</td>
                                        </tr>
                                        <tr>
                                            <td class="pro__title">Subtotal</td>
                                            <td class="pro__price">$10.33</td>
                                        </tr>
                                        <tr>
                                            <td class="pro__title">Shipping</td>
                                            <td class="pro__price">$0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="pro__title">Total</td>
                                            <td class="pro__price pro__price--total">$20.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="checkout-page__payment">
                                    <div class="checkout-page__payment__item checkout-page__payment__item--active">
                                        <h3 class="checkout-page__payment__title">Direct bank transfer</h3>
                                        <div class="checkout-page__payment__content" style="display: none;">
                                            <p>
                                                This includes their full name, bank account number, and sort code or routing number, depending on the country some banks require description of the payment.
                                            </p>
                                        </div><!-- /.checkout__payment__content -->
                                    </div><!-- /.checkout__payment__item -->
                                    <div class="checkout-page__payment__item">
                                        <h3 class="checkout-page__payment__title">Cash on Delivery</h3>
                                        <div class="checkout-page__payment__content" style="display: none;">
                                            <p>
                                                Neque porro est qui dolorem ipsum quia quaed inventor veritatis et quasi
                                                architecto
                                                beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var sed
                                                efficitur.
                                            </p>
                                        </div><!-- /.checkout__payment__content -->
                                    </div><!-- /.checkout__payment__item -->
                                    <div class="checkout-page__payment__item">
                                        <h3 class="checkout-page__payment__title">Payoneer</h3>
                                        <div class="checkout-page__payment__content" style="display: none;">
                                            <p>
                                                Make your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order will not be shipped until the funds have cleared
                                                in our account.
                                            </p>
                                        </div><!-- /.checkout__payment__content -->
                                    </div><!-- /.checkout__payment__item -->
                                </div><!-- /.checkout__payment -->
                                <div class="checkout-page__button">
                                    <a href="checkout.php" class="visanet-btn-two">
                                        Place Your Order <span class="visanet-btn-two__icon"><i class="icon-arrow-right"></i></span>
                                    </a><!-- /.visanet-btn-two -->
                                </div><!-- /.checkout-page__button -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.checkout-page__your-order -->
                </form><!-- /.checkout-page__form -->
            </div><!-- /.container -->
        </section><!-- /.checkout-page -->

      <?php include "../include/footer.php" ?>
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
            <form role="search" method="get" class="search-popup__form" action="checkout.php#">
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
                    <img src="<?php echo $domain ?>/assets/images/logo-dark.png" width="230" alt="<?php echo $sitename?>@gmail.comHTML" />
                </a>
            </div><!-- /.sidebar-three__logo -->
            <div class="sidebar-three__about sidebar-three__item">
                <p class="sidebar-three__about__text">
                    <?php echo $sitename?>@gmail.comis a modern HTML template built for immigration and visa consulting agencies, study abroad consultants, visa agents, and travel or overseas job services.
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
                <form action="checkout.php#" class="sidebar-three__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="EMAIL" id="sidebar-three-email" class="sidebar-three__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-three__newsletter__btn"><span class="far fa-envelope" aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-three__form -->
        </div><!-- /.sidebar-three__content -->
    </aside><!-- /.sidebar-three -->

    <a href="checkout.php#" data-target="html" class="scroll-to-target scroll-to-top">
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