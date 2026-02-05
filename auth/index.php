<?php
// use_soap_error_handler()
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Ravismedia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon.png and root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/favicon.ico">

    <!-- All css here -->

    <!-- bootstrap 4.0 css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- owl.carousel css -->
    <!-- Icon font css -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- online -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <!-- online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>


<body>
    <!-- preloader  -->
    <div id="preloader"></div>
    <!-- Start Slider Area -->
    <div class="login-area area-padding fix">
        <div class="login-overlay"></div>
        <div class="container">
            <div class="row justify-content-center text-center ">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="login-form">
                        <h4 class="login-title text-center">Login</h4>
                        <form id="contactForm" method="POST" class="log-form">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required data-error="Please enter your name">
                            <input type="password" name="password" id="msg_subject" class="form-control" placeholder="Password" required data-error="Please enter your message subject">
                            <div class="check-group">
                                <a class="text-muted" href="#">Forgot password?</a>
                            </div>
                            <button type="submit" id="submit" class="slide-btn login-btn">Login</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                            <div class="clear"></div>
                            <div class="separetor text-center"><span>Or with Login</span></div>
                            <div class="sign-icon">
                                <ul>
                                    <li> <a class="google" href="../0Auth/google-login.php">
                                            <i class="bi bi-google"></i>
                                        </a>

                                    </li>

                                    <?php if (!empty($_GET['error'])): ?>
                                        <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
                                    <?php endif; ?>

                                    <li><a class="facebook" href="#"><i class="bi bi-facebook"></i></a></li>

                                    <li><a class="instagram" href="#"><i class="bi bi-instagram"></i></a></li>
                                </ul>
                                <div class="acc-not">have an account? <a href="signup.php">Signup</a></div>
                            </div>
                        </form>

                        <script>
                            const Toast = Swal.mixin({
                                toast: true, // enable toast mode
                                position: 'center', // top-right (can be 'top-start', 'bottom-end', etc.)
                                showConfirmButton: false, // no OK button
                                timer:1300,
                                timerProgressBar: true
                            });

                            const form = document.getElementById('contactForm');
                            form.addEventListener('submit', async (e) => {
                                e.preventDefault();


                                try {
                                    const formData = new FormData(form);
                                    const response = await fetch('../server/api/client/login.php', {
                                        method: "POST",
                                        body: formData,

                                    })

                                    if (!response.ok) {
                                        throw new Error("response failed" + response.statusText);

                                    }
                                    const data = await response.json();
                                    if (data.status === "success") {
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'success',
                                            text: data.message,
                                        })
                                             setTimeout(()=>{
                                                 location.href = '../app/'

                                             }, 1400)
                                    } else {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'oops',
                                            text: data.message,

                                        })

                                    }


                                } catch (error) {
                                    console.error(error);
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'error',
                                        text: error.message,
                                    })

                                }

                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- All JS here -->

    <!-- modernizr JS -->
    <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Poper js -->
    <script src="../assets/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- plugins js -->
    <script src="../assets/js/plugins.js"></script>
    <!-- main js -->
    <script src="../assets/js/main.js"></script>
</body>

</html>