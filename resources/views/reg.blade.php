<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{!! asset('dist/vendor/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{!! asset('dist/vendor/font-awesome/css/font-awesome.min.css') !!}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{!! asset('dist/css/font.css') !!}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{!! asset('dist/css/style.default.css" id="theme-stylesheet') !!}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{!! asset('dist/css/custom.css') !!}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{!! asset('dist/img/favicon.ico') !!}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="login-page bg-dark">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info bg-dark d-flex align-items-center">
                        <div class="">
                            <div class="logo">
                                <img src="{!! asset('dist/img/threesinha.png') !!}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form id="register-form">
                                <div class="form-group">
                                    <input id="register-username" type="text" name="registerUsername" required
                                           class="input-material">
                                    <label for="register-username" class="label-material">User Name</label>
                                </div>
                                <div class="form-group">
                                    <input id="register-email" type="email" name="registerEmail" required
                                           class="input-material">
                                    <label for="register-email" class="label-material">Email Address </label>
                                </div>
                                <div class="form-group">
                                    <input id="register-passowrd" type="password" name="registerPassword" required
                                           class="input-material">
                                    <label for="register-passowrd" class="label-material">password </label>
                                </div>
                                <div class="form-group terms-conditions">
                                    <input id="license" type="checkbox" class="checkbox-template">
                                    <label for="license" class="no-margin-bottom">Agree the terms and policy</label>
                                </div>
                                <input id="register" type="submit" value="Register" class="btn btn-block btn-primary">
                            </form>
                            <small>Already have an account?</small>
                            <a href="login.html" class="signup">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="copyrights text-center">--}}
    {{--<p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>--}}
    {{--<!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->--}}
    {{--</div>--}}
</div>
<!-- Javascript files-->
<script src="{!! asset('https://code.jquery.com/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js') !!}"></script>
<script src="{!! asset('dist/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('dist/vendor/jquery.cookie/jquery.cookie.js') !!}"></script>
<script src="{!! asset('dist/vendor/chart.js/Chart.min.js') !!}"></script>
<script src="{!! asset('dist/js/front.js') !!}"></script>
</body>
</html>