<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('mail_schedule.index')); ?>"><cite><?php echo e(trans('mail_schedule.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.add')); ?><?php echo e(trans('mail_schedule.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('mail_schedule')); ?>" method="post" lay-filter="fb-form">

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('app.title')); ?> *</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('app.title')); ?>" class="layui-input" value="<?php echo e($mail_schedule->title); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.interval')); ?> *</label>
                        <div class="layui-input-block">
                            <input type="text" name="interval" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_schedule.label.interval')); ?>" class="layui-input" value="<?php echo e(config('model.mail.mail_schedule.interval')); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.per_hour_mail')); ?> *</label>
                        <div class="layui-input-block">
                            <input type="text" name="per_hour_mail" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_schedule.label.per_hour_mail')); ?>" class="layui-input" value="<?php echo e(config('model.mail.mail_schedule.per_hour_mail')); ?>">
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('mail_account.name')); ?> *</label>

                        <div class="layui-input-block">
                            <?php $mailAccountRepository = app('App\Repositories\Eloquent\MailAccountRepository'); ?>
                            <?php $__currentLoopData = $mailAccountRepository->getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mail_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="checkbox" name="mail_accounts[]"  title="<?php echo e($mail_account->username); ?>" value="<?php echo e($mail_account->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('mail_template.name')); ?> *</label>

                        <div class="layui-input-block">
                            <?php $mailTemplateRepository = app('App\Repositories\Eloquent\MailTemplateRepository'); ?>
                            <?php $__currentLoopData = $mailTemplateRepository->getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mail_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="checkbox" name="mail_templates[]" title="<?php echo e($mail_template->name); ?>" value="<?php echo e($mail_template->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.active')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="checkbox" name="active" value="1" lay-skin="switch" lay-text="是|否" lay-filter="active" checked>
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

