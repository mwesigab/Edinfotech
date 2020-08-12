<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Pro Academy</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/admin//modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin//modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/admin//modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/admin//css/style.css">
    <link rel="stylesheet" href="/assets/admin//css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="/assets/admin//img/logo.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>

                        <div class="card-body">
                            <form method="POST" action="/school/student/login">
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in a username that was given to you.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        Please fill in your password.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="/assets/admin//modules/jquery.min.js"></script>
<script src="/assets/admin//modules/popper.js"></script>
<script src="/assets/admin//modules/tooltip.js"></script>
<script src="/assets/admin//modules/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/admin//modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin//modules/moment.min.js"></script>
<script src="/assets/admin//js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="/assets/admin//js/scripts.js"></script>
<script src="/assets/admin//js/custom.js"></script>
</body>
</html>
<?php /**PATH D:\PRACTICE SESSIONS\PHP\Edtech\laravel\resources\views/schools/students/login_form.blade.php ENDPATH**/ ?>