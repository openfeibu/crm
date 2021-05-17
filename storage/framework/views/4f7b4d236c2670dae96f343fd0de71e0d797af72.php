<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('mail_schedule.index')); ?>"><cite><?php echo e(trans('mail_schedule.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.details')); ?><?php echo e(trans('mail_schedule.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <form class="layui-form" action="" lay-filter="fb-form">
                    <div class="layui-block table-search mb10">

                        <div class="layui-inline">
                            <select name="status" class="search_key layui-select">
                                <option value=""><?php echo e(trans('mail_schedule_report.label.status')); ?></option>
                                <?php $__currentLoopData = config('model.mail.mail_schedule_report.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status); ?>"><?php echo e(trans('mail_schedule_report.status.'.$status)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn" data-type="reload" type="button"><?php echo e(trans('app.search')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-Box">
                <table class="layui-table" lay-filter="fb-table" id="fb-table">

                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/html" id="emailTpl">

    {{#  if(d.status == 'failed'){ }}
    <span style="color:#FF5722">
    {{#  } else { }}
        <span style="">
    {{#  } }}
            {{ d.email }}
    </span>
</script>
<script>
    var main_url = "<?php echo e(guard_url('mail_schedule_report')); ?>";
    var delete_all_url = "<?php echo e(guard_url('mail_schedule_report/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('mail_schedule_report')); ?>?mail_schedule_id=<?php echo e($mail_schedule->id); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80,sort:true}
                ,{field:'email',title:'<?php echo e(trans('mail_schedule_report.label.email')); ?>', width:220,templet:'#emailTpl'}
                ,{field:'sent_desc',title:'<?php echo e(trans('mail_schedule_report.label.sent')); ?>', width:100}
                ,{field:'status_desc',title:'<?php echo e(trans('mail_schedule_report.label.status')); ?>'}
                ,{field:'mail_account_username',title:'<?php echo e(trans('mail_schedule_report.label.mail_account_username')); ?>'}
                ,{field:'mail_template_name',title:'<?php echo e(trans('mail_schedule_report.label.mail_template_name')); ?>'}
                ,{field:'send_at',title:'<?php echo e(trans('mail_schedule_report.label.send_at')); ?>', width:180}
                ,{field:'mail_return',title:'<?php echo e(trans('mail_schedule_report.label.mail_return')); ?>'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: '<?php echo e(config('app.limit')); ?>'
            ,height: 'full-200'
            ,cellMinWidth :'160'
            ,done:function () {
                element.init();
            }
        });

    });

</script>
<?php echo Theme::partial('common_handle_js'); ?>