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
                                   <span><a href="mailto:<?php echo $site_email ?>@gmail.com"><?php echo $site_email ?>@gmail.com</a></span>
                               </li>
                               <li>
                                   <span class="topbar__info__icon"><i class="icon-location"></i></span>
                                   <span><a href="#">25/09 Mozilla Golden Street</a></span>
                               </li>
                           </ul><!-- /.topbar__info -->
                           <div class="topbar__language">
                               <img src="<?php echo $domain ?>/assets/images/shapes/flag-1-1.png" alt="flag">
                               <!-- <label class="sr-only" for="language-select-header">select language</label> -->
                               <select class="selectpicker" id="language-select-header">
                                   <!-- <option value="english">English</option>
                                <option value="arabic">Arabic</option> -->
                               </select>
                           </div><!-- /.topbar__language -->
                       </div><!-- /.topbar__right -->
                   </div><!-- /.topbar__inner -->
               </div><!-- /.container -->
           </div><!-- /.topbar -->


           <header class="main-header main-header--two sticky-header sticky-header--one-page">
               <div class="container main-header__container">
                   <div class="main-header__inner">
                       <div class="main-header__left">
                           <div class="main-header__logo logo-retina">
                               <a href="<?php echo $domain ?>/visa/">
                                   <img height=100" src="<?php echo $domain ?>/assets/images/logo-light.png" alt="Visanet HTML" width="170">
                               </a>
                           </div><!-- /.main-header__logo -->
                       </div><!-- /.main-header__left -->
                       <div class="main-header__right">
                           <div class="main-header__top">
                               <div class="main-header__info">
                                   <span class="main-header__info__title">News:</span>
                                   <p class="main-header__info__text">I can’t browse the internet live, but this summary <span>reflects</span> the most recent .....</p>
                               </div><!-- /.main-header__info -->

                               <a href="<?php echo $domain ?>/contact.php" class="visanet-btn-two">
                                   Appointment <span class="visanet-btn-two__icon"><i class="icon-arrow-right-3"></i></span>
                               </a><!-- /.visanet-btn-two -->
                           </div><!-- /.main-header__top -->
                           <div class="main-header__bottom">
                               <nav class="main-header__nav main-menu">
                                   <ul class="main-menu__list one-page-scroll-menu">
                                       <li class="  scrollToLink current">
                                           <a href="<?php echo $domain ?>/">Home</a>
                                           <ul>



                                           </ul>
                                       </li>
                                       <li class="scrollToLink"><a href="<?php echo $domain ?>/about/">About</a></li>
                                       <li class="scrollToLink"><a href="<?php echo $domain ?>/visa/">Visa</a></li>
                                       <li class="scrollToLink"><a href="<?php echo $domain ?>/countries/">Countries</a></li>
                                       <li class="scrollToLink"><a href="<?php echo $domain ?>/gallery/">Gallery</a></li>
                                       <li class="scrollToLink"><a href="<?php echo $domain ?>/contact/">Contact us</a></li>

                                   </ul>
                               </nav><!-- /.main-header__nav -->

                               <div class="main-header__right__right">
                                   <div class="mobile-nav__btn mobile-nav__toggler">
                                       <span></span>
                                       <span></span>
                                       <span></span>
                                   </div><!-- /.mobile-nav__toggler -->

                                   <!-- <a href="<?php echo $domain ?>/contact.php" class="visanet-btn-two">
                                Appointment <span class="visanet-btn-two__icon"><i class="icon-arrow-right-3"></i></span>
                            </a>/ -->

                                   <a href="cart.php" class="main-header__cart">
                                       <!-- <i class="icon-trolley-cart" aria-hidden="true"></i> -->
                                       <a href="<?php echo $domain ?>/checkout/"
                                           class="btn btn-danger fw-semibold rounded-3 shadow-sm
          px-3 px-md-4 py-2
          d-none d-md-inline-flex align-items-center">
                                          Appointment
                                       </a>


                                       <!-- <span class="main-header__cart__quantity">Appointment</span> -->
                                   </a>

                                   <div class="main-header__call">
                                       <span class="main-header__call__icon">
                                           <i class="icon-phone-call"></i>
                                       </span><!-- /.main-header__call__icon -->
                                       <div class="main-header__call__content">
                                           <p class="main-header__call__title">Call Any Time</p>
                                           <a href="tel:+55222555255" class="main-header__call__number">+55 222 555 255</a>
                                       </div><!-- /.main-header__call__content -->
                                   </div><!-- /.main-header__call -->
                               </div><!-- /.main-header__right__right -->
                           </div><!-- /.main-header__bottom -->
                       </div><!-- /.main-header__right -->
                   </div><!-- /.main-header__inner -->
               </div><!-- /.container -->
           </header><!-- /.main-header -->