<div class="fb-main-table "id="payment_content" style="display: none">
    <form class="layui-form" action="" lay-filter="fb-form">
        <div class="layui-form-item fb-form-item">
            <label class="layui-form-label"><?php echo e(trans('payment.name')); ?> *</label>

            <div class="layui-input-block">
                <?php $paymentRepository = app('App\Repositories\Eloquent\PaymentRepository'); ?>
                <select name="payment_id" id="payment_id">
                    <?php $__currentLoopData = $paymentRepository->orderBy('id','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($payment->id); ?>"><?php echo e($payment->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item fb-form-item2">
            <label class="layui-form-label"><?php echo e(trans('order.label.payment_sn')); ?> *</label>
            <div class="layui-input-block">
                <input type="text" name="payment_sn" id="payment_sn" class="layui-input">
            </div>
        </div>
    </form>
</div>
<div class="fb-main-table "id="to_delivery_content" style="display: none">
    <form class="layui-form" action="" lay-filter="fb-form">
        <div class="layui-form-item fb-form-item2">
            <label class="layui-form-label"><?php echo e(trans('order.label.tracking_number')); ?> *</label>
            <div class="layui-input-block">
                <input type="text" name="tracking_number" id="tracking_number" class="layui-input">
            </div>
        </div>
    </form>
</div>