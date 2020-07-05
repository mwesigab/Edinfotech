
<?php $__env->startSection('title'); ?>
    <?php echo e(isset($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

    - <?php echo e(isset($post->title) ? $post->title : ''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="container">
            <div class="blog-section">
                    <div class="col-xs-12 row blog-post-box blog-post-box-s">
                        <div class="col-md-3 col-xs-12">
                            <img src="<?php echo e(isset($post->image) ? $post->image : ''); ?>" class="img-responsive">
                            <span class="date-section"><?php echo e(date('d F Y',$post->create_at)); ?></span>
                            <span class="date-section"><a href="/blog/category/<?php echo e(isset($post->category->id) ? $post->category->id : ''); ?>"><?php echo e(isset($post->category->title) ? $post->category->title : ''); ?></a></span>
                        </div>
                        <div class="col-md-9 col-xs-12 text-section">
                            <?php echo isset($post->pre_content) ? $post->pre_content : ''; ?>

                            <hr>
                            <?php echo isset($post->content) ? $post->content : ''; ?>

                            <br>
                            <span><?php echo e(trans('main.tags')); ?> :</span>
                            <?php $__currentLoopData = explode(',',$post->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <i class="content-tag"> <a href="/blog/tag/<?php echo e($tag); ?>"><?php echo e($tag); ?></a> </i>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($setting['site']['blog_comment'] == 1 && $post->comment == 'enable'): ?>
                                <div class="blog-comment-section">
                                    <h4><?php echo e(trans('main.comments')); ?></h4>
                                    <hr>
                                    <form method="post" action="/blog/post/comment/store">

                                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>"/>
                                        <input type="hidden" name="parent" value="0" />
                                        <div class="form-group">
                                            <label><?php echo e(trans('main.your_comment')); ?></label>
                                            <textarea class="form-control" name="comment" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-custom pull-left" value="Send">
                                        </div>
                                    </form>

                                    <ul class="comment-box">
                                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="/profile/<?php echo e(isset($comment->user_id) ? $comment->user_id : ''); ?>"><?php echo e(isset($comment->name) ? $comment->name : ''); ?></a>
                                                <label><?php echo e(date('d F Y | H:i',$comment->create_at)); ?></label>
                                                <span><?php echo isset($comment->comment) ? $comment->comment : ''; ?></span>
                                                <span><a href="javascript:void(0);" answer-id="<?php echo e($comment->id); ?>" answer-title="<?php echo e(isset($comment->name) ? $comment->name : ''); ?>" class="pull-left answer-btn"><?php echo e(trans('main.reply')); ?></a> </span>
                                                <?php if(count($comment->childs)>0): ?>
                                                    <ul class="col-md-11 col-md-offset-1 answer-comment">
                                                        <?php $__currentLoopData = $comment->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="/profile/<?php echo e(isset($child->user_id) ? $child->user_id : ''); ?>"><?php echo e(isset($child->name) ? $child->name : ''); ?></a>
                                                                <label><?php echo e(date('d F Y | H:i',$child->create_at)); ?></label>
                                                                <span><?php echo isset($child->comment) ? $child->comment : ''; ?></span>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('.answer-btn').click(function () {
                var parent = $(this).attr('answer-id');
                var title = $(this).attr('answer-title');
                $('input[name="parent"]').val(parent);
                scrollToAnchor('.blog-comment-section');
                $('textarea').attr('placeholder',' Replied to '+title);
            });
        });
    </script>
    <?php if(!isset($user)): ?>
        <script>
            $(document).ready(function () {
                $('input[type="submit"]').click(function (e) {
                    e.preventDefault();
                    $('input[type="submit"]').val('Please login to your account to leave comment.')
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>