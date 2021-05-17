<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('mail_template.index')); ?>"><cite><?php echo e(trans('mail_template.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.add')); ?><?php echo e(trans('mail_template.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('mail_template')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item">
                        <label class="layui-form-label">业务员 </label>

                        <div class="layui-input-block">
                            <?php $salesmanRepository = app('App\Repositories\Eloquent\SalesmanRepository'); ?>
                            <select name="salesman_id" id="salesman_id" lay-filter="" lay-search>
                                <option value="">请选择业务员(不选默认超管所有)</option>
                                <?php $__currentLoopData = $salesmanRepository->where('active',1)->orderBy('order','asc')->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($salesman->id); ?>" <?php if($salesman->id == $mail_template->salesman_id): ?> selected <?php endif; ?>><?php echo e($salesman->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_template.label.name')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_template.label.name')); ?>" class="layui-input" value="<?php echo e($mail_template->name); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_template.label.subject')); ?> *</label>

                        <div class="layui-input-block">
                            <input type="text" name="subject" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo e(trans('mail_template.label.subject')); ?>" class="layui-input" value="<?php echo e($mail_template->subject); ?>">
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('mail_template.label.content')); ?> *</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="width:1000px;height:240px;">
                            </script>
                        </div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label"><?php echo e(trans('mail_template.label.active')); ?> *</label>

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

<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();
</script>