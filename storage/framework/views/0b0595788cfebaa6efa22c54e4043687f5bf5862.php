<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('customer.index')); ?>"><cite><?php echo e(trans('customer.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.add')); ?><?php echo e(trans('customer.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('customer')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">客户名称 *</label>

                        <div class="layui-input-block">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入客户名称" class="layui-input" value="<?php echo e($customer->name); ?>">
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">IG号</label>

                        <div class="layui-input-block">
                            <input type="text" name="ig" lay-verify="title" autocomplete="off" placeholder="请输入IG号" class="layui-input" value="<?php echo e($customer->ig); ?>">
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">手机号</label>

                        <div class="layui-input-block">
                            <input type="text" name="mobile" autocomplete="off" placeholder="请输入手机号" class="layui-input" value="<?php echo e($customer->mobile); ?>">
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">邮箱</label>

                        <div class="layui-input-block">
                            <input type="text" name="email"  autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="<?php echo e($customer->email); ?>">
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">imessage</label>

                        <div class="layui-input-block">
                            <input type="text" name="imessage" autocomplete="off" placeholder="请输入imessage" class="layui-input" value="<?php echo e($customer->imessage); ?>">
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">whatsapp</label>

                        <div class="layui-input-block">
                            <input type="text" name="whatsapp" autocomplete="off" placeholder="请输入whatsapp" class="layui-input" value="<?php echo e($customer->whatsapp); ?>">
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('freight_area.name')); ?></label>

                        <div class="layui-input-block">
                            <select name="area_code" lay-filter="checkBox">
                                <?php $freight_area = app('App\Models\FreightArea'); ?>
                                <?php $i=0; ?>
                                <?php $__currentLoopData = $freight_area->orderBy('order','asc')->orderBy('code','asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $freight_area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($freight_area->code); ?>" <?php if($i == 0): ?> select <?php endif; ?>><?php echo e($freight_area->name); ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">地址</label>

                        <div class="layui-input-block">
                            <textarea name="address" placeholder="请输入地址" class="layui-textarea"></textarea>
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('customer.label.remark')); ?></label>

                        <div class="layui-input-block">
                            <textarea name="remark" placeholder="请输入<?php echo e(trans('customer.label.remark')); ?>" class="layui-textarea"></textarea>
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('customer.label.chat_app_account')); ?></label>

                        <div class="layui-input-block">
                            <textarea name="chat_app_account" placeholder="请输入<?php echo e(trans('customer.label.chat_app_account')); ?>" class="layui-textarea"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">客户来源</label>

                        <div class="layui-input-block">
                            <select name="from" lay-filter="checkBox">
                                <?php $__currentLoopData = config('model.customer.customer.from'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($from); ?>"><?php echo e($from); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('customer.label.level')); ?></label>

                        <div class="layui-input-block">
                            <select name="from" lay-filter="checkBox">
                                <?php $__currentLoopData = config('model.customer.customer.level'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($level); ?>"><?php echo e($level); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>

