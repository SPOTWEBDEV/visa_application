<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Signup - HYIP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon.png and root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/favicon.ico">

    <!-- All css here -->

    <!-- bootstrap 4.0 css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Icon font css -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@0.1.2/css/themify-icons.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery (required by Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Your custom script (the big one you pasted) -->
    <script src="../assets/js/main.js"></script>


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
                    <div class="login-form signup-form">
                        <h4 class="login-title text-center">REGISTER</h4>
                        <form id="contactForm" method="POST" class="log-form">
                            <input type="text" name="username" id="name" class="form-control" placeholder="Username" required data-error="Please enter your name">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required data-error="Please enter your name">
                            <input type="password" name="password" id="msg_subject" class="form-control" placeholder="Password" required data-error="Please enter your message subject">
                            <input type="password" name="confirm_password" id="cmsg_subject" class="form-control" placeholder="Confirm Password" required data-error="Please enter your message subject">
                            <div class="check-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="checkbox" value="">Terms & Conditions</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="slide-btn login-btn">Sign up</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                            <div class="clear"></div>
                            <div class="separetor text-center"><span>Or with Signup</span></div>
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
                                <div class="acc-not">have an account? <a href="index.php">Login</a></div>
                            </div>
                        </form>

                        <script>
                            // Swal.fire({
                            //     icon: 'success', // success, error, warning, info, question
                            //     title: 'Success!',
                            //     text: 'SweetAlert2 is working fine',
                            //     timer: 2000, // auto close after 2s
                            //     showConfirmButton: false,
                            //     position: 'bottom-end' // like toastr bottom-right
                            // });

                            // Swal.fire({
                            //     icon: 'success', // success, error, warning, info, question
                            //     title: 'Success!',
                            //     text: 'Your action was completed successfully!'
                            // showCancelButton: true,
                            //     confirmButtonText: 'Yes, delete it!',
                            //     cancelButtonText: 'No, cancel!',
                            // });

                            // error 
                            // Swal.fire({
                            //   icon: 'error',
                            //   title: 'Oops...',
                            //   text: 'Something went wrong!'
                            // });



                            // Example: Text input
                            // Swal.fire({
                            //     title: 'Enter your name',
                            //     input: 'text',
                            //     inputPlaceholder: 'Type your name here',
                            //     showCancelButton: true,
                            //     confirmButtonText: 'Submit'
                            // }).then((result) => {
                            //     if (result.isConfirmed) {
                            //         Swal.fire(`Hello, ${result.value}! 👋`);
                            //     }
                            // });


                            const form = document.getElementById("contactForm");
                            form.addEventListener('submit', (event) => {
                                event.preventDefault();
                                let formData = new FormData(form);
                                console.log("submiting");

                                Swal.fire({
                                    title: 'Please wait...',
                                    text: '',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                fetch("../server/api/client/register.php", {
                                        method: "POST",
                                        body: formData
                                    })
                                    .then(Response => {
                                        if (!Response.ok) {
                                            throw new Error("response was not ok " + Response.statusText);

                                        }
                                        return Response.json();

                                    })
                                    .then(data => {
                                        if (data.status === 'success') {
                                            Swal.fire({
                                                icon: 'success', // success, error, warning, info, question
                                                title: 'success',
                                                text: data.message
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = "./index.php";
                                                }
                                            });
                                        }

                                        if (data.status === 'error') {
                                            Swal.fire({
                                                icon: 'error',
                                                title: '0ops..',

                                                text: data.message
                                            });
                                        }

                                    })
                                    .catch(error => {
                                        console.error("failed" + error);
                                        Swal.fire({
                                            icon: 'error', // success, error, warning, info, question
                                            title: 'oops..',
                                            text: error.message
                                        });

                                    })




                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- All JS here -->
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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