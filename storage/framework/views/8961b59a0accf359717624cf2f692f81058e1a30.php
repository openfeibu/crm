<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(guard_url('mail_account')); ?>"><cite><?php echo e(trans('mail_account.title')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <form class="layui-form" action="" lay-filter="fb-form">
                    <div class="layui-block mb10">
                        <div class="layui-inline tabel-btn">
                            <button class="layui-btn layui-btn-warm " type="button"><a href="<?php echo e(guard_url('mail_account/create')); ?>"><?php echo e(trans('app.add')); ?> <?php echo e(trans('mail_account.name')); ?></a></button>
                            <button class="layui-btn layui-btn-danger " type="button" data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" href="<?php echo e(guard_url('mail_account')); ?>/{{ d.id }}"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>

<script>
    var main_url = "<?php echo e(guard_url('mail_account')); ?>";
    var delete_all_url = "<?php echo e(guard_url('mail_account/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('mail_account')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80,sort:true}
                ,{field:'host',title:'<?php echo e(trans('mail_account.label.host')); ?>'}
                ,{field:'port',title:'<?php echo e(trans('mail_account.label.port')); ?>'}
                ,{field:'username',title:'<?php echo e(trans('mail_account.label.username')); ?>',edit:'text', width:200}
                ,{field:'password',title:'<?php echo e(trans('mail_account.label.password')); ?>',edit:'text'}
                ,{field:'from_address',title:'<?php echo e(trans('mail_account.label.from_address')); ?>',edit:'text', width:200}
                ,{field:'from_name',title:'<?php echo e(trans('mail_account.label.from_name')); ?>',edit:'text'}
                ,{field:'encryption',title:'<?php echo e(trans('mail_account.label.encryption')); ?>',edit:'text'}
                ,{field:'address',title:'<?php echo e(trans('mail_account.label.address')); ?>',edit:'text'}
                ,{field:'name',title:'<?php echo e(trans('mail_account.label.name')); ?>',edit:'text'}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:180, align: 'right',toolbar:'#barDemo', fixed: 'right'}
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

