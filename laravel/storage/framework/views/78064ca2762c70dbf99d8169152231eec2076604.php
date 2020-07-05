<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Payment Details</title>

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
        <div class="container mt-12">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="/assets/admin//img/logo.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                </div>

                <div class="col-12 col-sm-8 offset-sm-2 col-md-6">
                    <div class="login-s">
                        <div class="h-25"></div>
                        <div class="h-25"></div>
                        <div class="container">
                            <div class="card mx-auto" style="width: 780px;margin: 0 auto;float: none;margin-bottom: 10px;">
                                <div class="card-header text-center">
                                    <h3>Payment Details</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/school/student/pay" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <input type="text" class="form-control" id="amount"
                                                           placeholder="Enter Amount" name="amount">
                                                    <input type="hidden" class="form-control" id="description"
                                                           value="Student Course Payment" name="description">
                                                    <input type="hidden" name="country" value="NG" />
                                                    <input type="hidden" name="currency" value="UGX"/>
                                                    <input type="hidden" name="payment_method" value="both" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pull-right">
                                                <div class="form-group">
                                                    <label for="phonenumber ">Phone Number</label>
                                                    <input type="text" class="form-control" id="phonenumber "
                                                           placeholder="Enter Phone Number" name="phonenumber ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="First Name" name="firstname">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pull-right">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="Last Name" name="lastname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="Enter Email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pull-right">
                                                <div class="form-group">
                                                    <label for="school_period">School Period</label>
                                                    <select id="school_period" class="form-control" name="school_period">
                                                        <?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($period->id); ?>"><?php echo e($period->payment_period); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pull-left">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="h-25"></div>
                            </div>
                        </div>
                        <div class="h-25"></div>
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

