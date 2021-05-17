<label class="layui-form-label">选择<?php echo e($attribute['name']); ?> *</label>
<div class="fb-form-item-box fb-clearfix">
    <?php $__currentLoopData = $attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="layui-input-block">
            <input type="checkbox" name="attribute_value[<?php echo e($attribute_value['id']); ?>]" lay-skin="primary" title="<?php echo e($attribute_value['value']); ?>" checked="">
            <input type="text" name="purchase_price[<?php echo e($attribute_value['id']); ?>]" lay-verify="title" autocomplete="off" placeholder="<?php echo e(trans('goods.label.purchase_price')); ?>" class="layui-input minInput">
            <input type="text" name="selling_price[<?php echo e($attribute_value['id']); ?>]" lay-verify="title" autocomplete="off" placeholder="<?php echo e(trans('goods.label.selling_price')); ?>" class="layui-input minInput">
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>