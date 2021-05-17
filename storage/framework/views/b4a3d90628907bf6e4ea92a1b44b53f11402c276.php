<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(guard_url('customer')); ?>"><cite><?php echo e(trans('customer.title')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <form class="layui-form" action="" lay-filter="fb-form">
                    <div class="layui-block mb10">
                        <div class="layui-inline tabel-btn">
                            <button class="layui-btn layui-btn-warm " type="button"><a href="<?php echo e(guard_url('customer/create')); ?>"><?php echo e(trans('app.add')); ?> <?php echo e(trans('customer.name')); ?></a></button>
                            <button class="layui-btn layui-btn-warm " type="button"><a href="<?php echo e(guard_url('customer_import')); ?>">批量上传</a></button>
                            <button class="layui-btn layui-btn-primary " type="button" data-type="download" data-events="download">下载 Excel</button>
                            <button class="layui-btn layui-btn-danger " type="button" data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                        </div>
                    </div>
                    <div class="layui-block table-search mb10">
                        <div class="layui-inline">
                            <select name="salesman_id" class="search_key layui-select">
                                <?php $salesmanRepository = app('App\Repositories\Eloquent\SalesmanRepository'); ?>
                                <option value=""><?php echo e(trans('salesman.name')); ?></option>
                                <?php $__currentLoopData = $salesmanRepository->orderBy('name','asc')->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($salesman->id); ?>"><?php echo e($salesman->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="name" id="demoReload" placeholder="<?php echo e(trans('customer.label.name')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="email" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.email')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="mobile" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.mobile')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="ig" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.ig')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="imessage" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.imessage')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="whatsapp" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.whatsapp')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn" type="button" data-type="reload"><?php echo e(trans('app.search')); ?></button>
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
    <a class="layui-btn layui-btn-sm" href="<?php echo e(guard_url('customer')); ?>/{{ d.id }}"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>

<script>
    var main_url = "<?php echo e(guard_url('customer')); ?>";
    var delete_all_url = "<?php echo e(guard_url('customer/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('customer')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80,sort:true}
                ,{field:'name',title:'<?php echo e(trans('customer.label.name')); ?>',edit:'text'}
                ,{field:'salesman_name',title:'<?php echo e(trans('salesman.label.name')); ?>'}
                ,{field:'ig',title:'<?php echo e(trans('customer.label.ig')); ?>',edit:'text'}
                ,{field:'from',title:'<?php echo e(trans('customer.label.from')); ?>',edit:'text'}
                ,{field:'email',title:'<?php echo e(trans('customer.label.email')); ?>',edit:'text'}
                ,{field:'mobile',title:'<?php echo e(trans('customer.label.mobile')); ?>',edit:'text'}
                ,{field:'imessage',title:'<?php echo e(trans('customer.label.imessage')); ?>',edit:'text'}
                ,{field:'whatsapp',title:'<?php echo e(trans('customer.label.whatsapp')); ?>',edit:'text'}
                ,{field:'address',title:'<?php echo e(trans('customer.label.address')); ?>',edit:'text'}
                ,{field:'order_count',title:'<?php echo e(trans('customer.label.order_count')); ?>'}
                ,{field:'remark',title:'<?php echo e(trans('customer.label.remark')); ?>',edit:'text'}
                ,{field:'chat_app_account',title:'<?php echo e(trans('customer.label.chat_app_account')); ?>', width:240,edit:'text'}
                ,{field:'level',title:'<?php echo e(trans('customer.label.level')); ?>', width:240,edit:'text',sort:true}
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
        //监听在职操作
        form.on('switch(active)', function(obj){
            var data = $(obj.elem);
            var id = data.parents('tr').first().find('td').eq(1).text();
            var ajax_data = {};
            ajax_data['_token'] = "<?php echo csrf_token(); ?>";
            ajax_data['active'] = obj.elem.checked == true ? 1 : 0;
            var load = layer.load();
            $.ajax({
                url : main_url+'/'+id,
                data : ajax_data,
                type : 'PUT',
                success : function (data) {
                    layer.close(load);
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    $.ajax_error(jqXHR, textStatus, errorThrown);
                }
            });
        });
    });
</script>

<?php echo Theme::partial('common_handle_js'); ?>

<script>
    layui.use(['jquery','element','table'], function() {
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        active.download = function () {
            var checkStatus = table.checkStatus('fb-table')
                    ,data = checkStatus.data;
            var data_id_obj = {};
            var i = 0;
            var url = '<?php echo e(guard_url('customer_download')); ?>';
            var paramStr = "";
            data.forEach(function(v){
                if(i == 0)
                {
                    paramStr += "?ids[]="+v.id;
                }else{
                    paramStr += "&ids[]="+v.id;
                }
                data_id_obj[i] = v.id; i++
            });
            $(".search_key").each(function(){
                var name = $(this).attr('name');
                if(i == 0)
                {
                    paramStr += "?search["+name+"]="+$(this).val();
                }else{
                    paramStr += "&search["+name+"]="+$(this).val();
                }
                i++
            });
            var load =layer.load();
            window.location.href = url+paramStr;
            layer.close(load);
        }

    })
</script>