
<?php $__env->startSection('title', 'About'); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body text-center">
            <img src="<?php echo get_option('site_logo'); ?>">
            <div class="h-10"></div>
			<h3>Proacademy LMS</h3>
            <h4>Version: 1.4</h4>
            <div class="h-10"></div>
            <h5><p>Purchase from <a href="https://codecanyon.net/item/proacademy-lms-online-courses-marketplace/25384806">Codecanyon</a></p></h5>
			<p><a href="mailto:prodevelopersteam@gmail.com">Contact support</a></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>