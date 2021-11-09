{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css" >
</head>
<body>
    <main>
<!--======================================= Sign in Page Start =========================================-->
        <section class="signin-form">
            <div class="signin-wrapper">
                <form class="signin" action="{{ route('login') }}" method="POST">
                   @csrf
                    <h3>Client Sign In Page</h3>
                    <div class="input-grp">
                        <input type="email"  name="email" placeholder="name@example.com">
                        <input type="password" name="password"  placeholder="Password">
                    </div>
                    <div class="signin-main-btn">
                        <button class="signin-btn" type="submit"><h4>Sing In</h4> </button>
                      
                        <a class="forget-pw-btn" href="#"> <h4>Forget Password</h4>  </a>
                    </div>
                </form>
               
            </div>

        </section>
<!--======================================= Sign in Page End =========================================-->
    </main>
    <footer>
        <div class="footer-main">
            <div class="footer-subbg">
                <img src="{{asset('assets')}}/images/backgrounds/Group 832.png" alt="img-not-found">
            </div>
            <div class="footerbg"></div>       
        </div>
    </footer>
</body>
</html> --}}





<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>User Login | Shapla City</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('assets')}}/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('assets')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

<body>

    
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Shapla City</h5>
                                <p class="text-white-50">Sign in to continue to Shaple City.</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{asset('assets')}}/images/logo-sm.png" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="signin" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="username">File No</label>
                                        <input type="text" class="form-control" id="username" name="file_no" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="#"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> All right reserved by Shapla City.</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets')}}/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('assets')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('assets')}}/libs/node-waves/waves.min.js"></script>

    <script src="{{asset('assets')}}/js/app.js"></script>

</body>

</html>