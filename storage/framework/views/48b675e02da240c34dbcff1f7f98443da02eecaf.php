<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('salesman.index')); ?>"><cite><?php echo e(trans('salesman.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.edit')); ?><?php echo e(trans('salesman.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('salesman/'.$salesman->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.email")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" value="<?php echo e($salesman->email); ?>" lay-verify="email|required" autocomplete="off" placeholder="请输入<?php echo e(trans("salesman.label.email")); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.name")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" value="<?php echo e($salesman->name); ?>" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans("salesman.label.name")); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.en_name")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_name" value="<?php echo e($salesman->en_name); ?>"  autocomplete="off" placeholder="请输入<?php echo e(trans("salesman.label.en_name")); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.entry_date")); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="entry_date" value="<?php echo e($salesman->entry_date); ?>"  autocomplete="off" placeholder="请输入<?php echo e(trans("salesman.label.entry_date")); ?>" class="layui-input" id="entry_date" value="<?php echo e($salesman->entry_date); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.active")); ?></label>
                        <div class="layui-input-inline">
                            <input type="checkbox" name="active" value="1" lay-skin="switch" lay-text="是|否" lay-filter="active" <?php if($salesman->active): ?> checked <?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("admin_user.label.new_password")); ?></label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" placeholder="请输入<?php echo e(trans("admin_user.label.password")); ?>，不改则留空" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请输入密码，不改则留空</div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.ig")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ig" placeholder="请输入<?php echo e(trans("salesman.label.ig")); ?>" autocomplete="off" class="layui-input" value="<?php echo e($salesman->ig); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.imessage")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="imessage" placeholder="请输入<?php echo e(trans("salesman.label.imessage")); ?>" autocomplete="off" class="layui-input" value="<?php echo e($salesman->imessage); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.mobile")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="mobile" placeholder="请输入<?php echo e(trans("salesman.label.mobile")); ?>" autocomplete="off" class="layui-input" value="<?php echo e($salesman->mobile); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.monthly_performance_target")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="monthly_performance_target" placeholder="请输入<?php echo e(trans("salesman.label.monthly_performance_target")); ?>" autocomplete="off" class="layui-input" value="<?php echo e($salesman->monthly_performance_target); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("salesman.label.yearly_performance_target")); ?> *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="yearly_performance_target" placeholder="请输入<?php echo e(trans("salesman.label.yearly_performance_target")); ?>" autocomplete="off" class="layui-input" value="<?php echo e($salesman->yearly_performance_target); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans("admin_user.label.roles")); ?> *</label>
                        <div class="layui-input-block">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="radio" name="roles[]" value="<?php echo e($role->id); ?>" title="<?php echo e($role->name); ?>" <?php echo e(!($salesman->hasRole($role->slug)) ? :'checked'); ?>>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<script>
    layui.use(['jquery','element','table','laydate'], function () {
        var laydate= layui.laydate,
                form = layui.form,
                $ = layui.jquery,
                layer = layui.layer;

        laydate.render({
            elem: '#entry_date'
            ,type: 'date'
            ,value:"<?php echo e($salesman->entry_date); ?>"
        });
    });
</script>

<script>
</script>