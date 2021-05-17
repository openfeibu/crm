<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('mail_account.index')); ?>"><cite><?php echo e(trans('mail_account.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.edit')); ?><?php echo e(trans('mail_account.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('mail_account/'.$mail_account->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item">
                        <label class="layui-form-label">分配业务员 </label>

                        <div class="layui-input-block">
                            <?php $salesmanRepository = app('App\Repositories\Eloquent\SalesmanRepository'); ?>
                            <select name="salesman_id" id="salesman_id" lay-filter="" lay-search>
                                <option value="0">请选择业务员(不选默认超管所有)</option>
                                <?php $__currentLoopData = $salesmanRepository->where('active',1)->orderBy('order','asc')->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($salesman->id); ?>" <?php if($salesman->id == $mail_account->salesman_id): ?> selected <?php endif; ?>><?php echo e($salesman->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.host')); ?> *</label>

                        <div class="layui-input-block">
                            <select name="host" lay-filter="checkBox">
                                <?php $__currentLoopData = config('model.mail.mail_account.host'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $host): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($host); ?>" <?php if($host == $mail_account->host): ?> selected <?php endif; ?>><?php echo e($host); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.port')); ?> *</label>

                        <div class="layui-input-block">
                            <select name="port" lay-filter="checkBox">
                                <?php $__currentLoopData = config('model.mail.mail_account.port'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $port): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($port); ?>" <?php if($port == $mail_account->port): ?> selected <?php endif; ?>><?php echo e($port); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.username')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="username" lay-verify="email" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.username')); ?>" class="layui-input" value="<?php echo e($mail_account->username); ?>">
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.password')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="password" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.password')); ?>" class="layui-input" value="<?php echo e($mail_account->password); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.from_address')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="from_address" lay-verify="email" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.from_address')); ?>" class="layui-input" value="<?php echo e($mail_account->from_address); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.from_name')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="from_name" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.from_name')); ?>" class="layui-input" value="<?php echo e($mail_account->from_name); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.encryption')); ?> *</label>

                        <div class="layui-input-block">
                            <select name="encryption" lay-filter="checkBox">
                                <?php $__currentLoopData = trans('mail_account.encryption'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $encryption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($encryption); ?>" <?php if($encryption == $mail_account->encryption): ?> selected <?php endif; ?>><?php echo e($encryption); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.address')); ?></label>

                        <div class="layui-input-block">
                            <input type="text" name="address" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.address')); ?>" class="layui-input" value="<?php echo e($mail_account->address); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.label.name')); ?></label>

                        <div class="layui-input-block">
                            <input type="text" name="name" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_account.label.name')); ?>" class="layui-input" value="<?php echo e($mail_account->name); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>

