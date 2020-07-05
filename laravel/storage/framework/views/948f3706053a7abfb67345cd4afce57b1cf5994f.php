
<?php $__env->startSection('title', 'About'); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body text-center">
            <img src="<?php echo get_option('site_logo'); ?>">
            <div class="h-10"></div>
			<h3>Edinfotech.com</h3>
            <h4>Version: 1.5</h4>
            <div class="h-10"></div>
            <h5><p>Built by <a href="https://elitepathsoftware.com">Elitepath Software Ltd</a></p></h5>
			<p><a href="mailto:sale@elitepathsoftware.com">Contact support</a></p>
			<p>If you want to edit this page go on sourcecodes at /public_html/laravel/resources/views/admin/about.blade.php</a></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>