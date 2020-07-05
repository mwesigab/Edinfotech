

<?php if($user['vendor'] == 1): ?>
    <?php $__env->startSection('tab4','active'); ?>
<?php else: ?>
    <?php $__env->startSection('tab3','active'); ?>
<?php endif; ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <div class="row ucp-top-panel">
        <div class="col-md-3 col-xs-12 tab-con">
            <div class="top-panel-box-balance sbox3 sbox3-s">
                <span><?php echo e(trans('main.account_charge')); ?></span>
                <label><?php echo e(currencySign()); ?><?php echo e(isset($user['credit']) ? $user['credit'] : 0); ?></label>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 tab-con">
            <?php if($user['vendor'] == 1): ?>
            <div class="top-panel-box-balance sbox3 sbox3-r">
                <span><?php echo e(trans('main.withdrawable_amount')); ?></span>
                <label><?php echo e(currencySign()); ?><?php echo e(isset($user['income']) ? $user['income'] : 0); ?></label>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 col-xs-12 tab-con mart-10">
            <form method="post" action="/user/balance/charge/pay" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-2 tab-con ta-r"><?php echo e(trans('main.gateway')); ?></label>
                    <div class="col-md-10">
                        <select name="type" class="form-control font-s">
                            <?php if(get_option('gateway_paypal') == 1): ?><option value="paypal">paypal</option><?php endif; ?>
                            <?php if(get_option('gateway_paytm') == 1): ?><option value="paytm">paytm</option><?php endif; ?>
                            <?php if(get_option('gateway_payu') == 1): ?><option value="payu">payu</option><?php endif; ?>
                            <?php if(get_option('gateway_paystack') == 1): ?><option value="paystack">paystack</option><?php endif; ?>
                            <option value="income"><?php echo e(trans('main.income')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 tab-con ta-r"><?php echo e(trans('main.amount')); ?> (<?php echo e(currencySign()); ?>)</label>
                    <div class="col-md-6 tab-con">
                        <input type="text" placeholder="$" name="price" class="form-control text-center" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-custom pull-left btn-100-p"><?php echo e(trans('main.charge_account')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($user['vendor'] == 1?'user.layout.balancelayout':'user.layout_user.chargelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>