<?php if(!empty(session('Error'))): ?>

    <?php if(session('Error') == 'duplicate_user'): ?>
        <span><?php echo e(trans('main.entered_username_exists')); ?></span>
    <?php endif; ?>

    <?php if(session('Error') == 'duplicate_email'): ?>
        <span><?php echo e(trans('main.entered_email_exists')); ?></span>
    <?php endif; ?>

    <?php if(session('Error') == 'password_not_same'): ?>
        <span><?php echo e(trans('main.pass_confirmation_same')); ?></span>
    <?php endif; ?>

<?php endif; ?>

<form method="post" action="/user/doregister">

    <input type="text" name="username" placeholder="Username" required>
    <br>
    <input type="email" name="email" placeholder="Email" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <br>
    <input type="password" name="repassword" placeholder="Confirm Password" required>
    <br>
    <input type="submit" name="submit" value="Register">
    <br>
    <a href="/user/google/login"><?php echo e(trans('main.sign_in_google')); ?></a>
</form>