<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(guard_url('order')); ?>"><cite><?php echo e(trans('order.title')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <form class="layui-form" action="" lay-filter="fb-form">
                    <div class="layui-row mb10">
                        <div class="layui-inline tabel-btn">
                            <button class="layui-btn layui-btn-warm " type="button"><a href="<?php echo e(guard_url('order/create')); ?>"><?php echo e(trans('app.add')); ?> <?php echo e(trans('order.name')); ?></a></button>
                            <button class="layui-btn layui-btn-danger " data-type="del" data-events="del" type="button"><?php echo e(trans('app.delete')); ?></button>
                            <button class="layui-btn layui-btn-primary " data-type="download_purchase_order" data-events="download_purchase_order" type="button">下载采购表</button>
                            <button class="layui-btn layui-btn-primary " data-type="download_quotation_list" data-events="download_quotation_list" type="button">下载报价表</button>
                        </div>
                    </div>
                    <div class="layui-block mb10 table-search">
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
                            <?php $customerRepository = app('App\Repositories\Eloquent\CustomerRepository'); ?>
                            <select name="customer_id" id="customer_id" class="search_key layui-select" lay-filter="customer" lay-search>
                                <option value=""><?php echo e(trans('customer.name')); ?></option>
                                <?php $__currentLoopData = $customerRepository->orderBy('name','asc')->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?><?php if($customer->ig): ?> (<?php echo e($customer->ig); ?>)<?php endif; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="layui-inline">
                            <select name="order_status" class="layui-select search_key">
                                <option value=""><?php echo e(trans('order.label.order_status')); ?></option>
                                <?php $__currentLoopData = trans('order.order_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($order_status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <select name="shipping_status" class="layui-select search_key">
                                <option value=""><?php echo e(trans('order.label.shipping_status')); ?></option>
                                <?php $__currentLoopData = trans('order.shipping_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($shipping_status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <select name="pay_status" class="layui-select search_key">
                                <option value=""><?php echo e(trans('order.label.pay_status')); ?></option>
                                <?php $__currentLoopData = trans('order.pay_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pay_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($pay_status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="order_sn" id="demoReload" placeholder="<?php echo e(trans('order.label.order_sn')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="tracking_number" id="demoReload" placeholder="<?php echo e(trans('order.label.tracking_number')); ?>" autocomplete="off">
                        </div>
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="payment_sn" id="demoReload" placeholder="<?php echo e(trans('order.label.payment_sn')); ?>" autocomplete="off">
                        </div>

                        <div class="layui-inline">
                            <label class="layui-form-label"><?php echo e(trans('order.label.paid_at')); ?></label>
                            <div class="layui-input-inline">
                                <input class="layui-input search_key" name="paid_at" id="paid_at" placeholder="<?php echo e(trans('order.label.paid_at')); ?>" autocomplete="off" style="width: 200px;">
                            </div>
                        </div>

                        <div class="layui-inline">
                            <button class="layui-btn" data-type="reload" type="button"><?php echo e(trans('app.search')); ?></button>

                        </div>
                    </div>
                </form>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<?php echo $__env->make('order/handle_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script>
    var main_url = "<?php echo e(guard_url('order')); ?>";
    var delete_all_url = "<?php echo e(guard_url('order/destroyAll')); ?>";
    layui.use(['jquery','element','table','laydate'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        var laydate = layui.laydate;

        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('order')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', totalRowText: 'Total：',width:80}
                ,{field:'order_sn',title:'<?php echo e(trans('order.label.order_sn')); ?>'}
                ,{field:'salesman_name',title:'<?php echo e(trans('salesman.label.name')); ?>', width:120}
                ,{field:'customer_name',title:'<?php echo e(trans('customer.label.name')); ?>', templet: '<div>{{#  if(d.customer_id){ }}<a href="<?php echo e(guard_url('customer')); ?>/{{ d.customer_id }}" target="_blank" class="layui-table-link">{{d.customer_name}}</a>{{#  } else { }}  {{#  } }} </div>'}
                ,{field:'address',title:'<?php echo e(trans('order.label.address')); ?>', width:200}
                ,{field:'total',title:'<?php echo e(trans('order.label.total')); ?>', width:120, totalRow: true,toFixed:3}
                ,{field:'order_status_desc',title:'<?php echo e(trans('order.label.order_status')); ?>', width:120,templet:"#order_status_tpl"}
                ,{field:'shipping_status_desc',title:'<?php echo e(trans('order.label.shipping_status')); ?>', width:120,templet:"#shipping_status_tpl"}
                ,{field:'pay_status_desc',title:'<?php echo e(trans('order.label.pay_status')); ?>', width:120,templet:"#pay_status_tpl"}
                ,{field:'tracking_number',title:'<?php echo e(trans('order.label.tracking_number')); ?>', templet: '<div>{{#  if(d.tracking_number){ }}<a href="/tracking_number/{{d.tracking_number}}" target="_blank" class="layui-table-link">{{d.tracking_number}}</a>{{#  } else { }}  {{#  } }} </div>',width:150}
                ,{field:'payment_sn',title:'<?php echo e(trans('order.label.payment_sn')); ?>', templet: '<div>{{#  if(d.payment_sn){ }}<a href="/payment_sn/{{d.payment_sn}}" target="_blank" class="layui-table-link">{{d.payment_sn}}</a>{{#  } else { }}  {{#  } }} </div>', width:180}
                ,{field:'paid_total',title:'<?php echo e(trans('order.label.paid_total')); ?>', width:120,edit:'text', totalRow: true,toFixed:3}
                ,{field:'remark',title:'<?php echo e(trans('app.remark')); ?>',edit:'text', width:120}
                ,{field:'number',title:'<?php echo e(trans('order.label.number')); ?>', width:120}
                ,{field:'weight',title:'<?php echo e(trans('order.label.weight')); ?>', width:120}
                ,{field:'freight',title:'<?php echo e(trans('order.label.freight')); ?>', width:120}
                ,{field:'paypal_fee',title:'<?php echo e(trans('order.label.paypal_fee')); ?>', width:120}
                ,{field:'purchase_price',title:'<?php echo e(trans('order.label.purchase_price')); ?>', width:120}
                ,{field:'selling_price',title:'<?php echo e(trans('order.label.selling_price')); ?>', width:120}
                ,{field:'created_at',title:'<?php echo e(trans('app.created_at')); ?>', width:120}
                ,{field:'paid_at',title:'<?php echo e(trans('order.label.paid_at')); ?>', width:120}
                ,{field:'shipped_at',title:'<?php echo e(trans('order.label.shipped_at')); ?>', width:120}
                ,{field:'admin_remark',title:'<?php echo e(trans('order.label.admin_remark')); ?>',edit:'text', width:120 ,fixed: 'right'}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:310, align: 'right',toolbar:'#barDemo', fixed: 'right'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: '<?php echo e(config('app.limit')); ?>'
            ,height: 'full-200'
            ,cellMinWidth :'180'
            ,totalRow: true //开启合计行
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
//年月范围选择
        laydate.render({
            elem: '#paid_at'
            ,range: '~' //或 range: '~' 来自定义分割字符
        });
    });
</script>

<?php echo Theme::partial('common_handle_js'); ?>

<?php echo $__env->make('order/handle_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    layui.use(['jquery','element','table'], function() {
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        active.download_purchase_order = function () {
            var checkStatus = table.checkStatus('fb-table')
                    ,data = checkStatus.data;
            var data_id_obj = {};
            var i = 0;
            var url = '<?php echo e(guard_url('order_download/purchase_order')); ?>';
            var paramStr = "";
            if(data.length == 0)
            {
                layer.msg('请选择数据', {
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                })
                return false;
            }
            data.forEach(function(v){
                if(i == 0)
                {
                    paramStr += "?ids[]="+v.id;
                }else{
                    paramStr += "&ids[]="+v.id;
                }
                data_id_obj[i] = v.id; i++
            });
            window.location.href=url+paramStr;
        }
        active.download_quotation_list = function () {
            var checkStatus = table.checkStatus('fb-table')
                    ,data = checkStatus.data;
            var data_id_obj = {};
            var i = 0;
            var url = '<?php echo e(guard_url('order_download/quotation_list')); ?>';
            var paramStr = "";
            if(data.length == 0)
            {
                layer.msg('请选择数据', {
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                })
                return false;
            }
            data.forEach(function(v){
                if(i == 0)
                {
                    paramStr += "?ids[]="+v.id;
                }else{
                    paramStr += "&ids[]="+v.id;
                }
                data_id_obj[i] = v.id; i++
            });
            window.location.href=url+paramStr;
        }
//        $('.order-btn').on('click', function(){
//            var type = $(this).attr('type');
//            order_handle[type] ? order_handle[type].call(this) : '';
//        });
        $.extend_tool = function (obj) {
            var data = obj.data;
            data['_token'] = "<?php echo csrf_token(); ?>";
            data['nPage'] = $(".layui-laypage-curr em").eq(1).text();

            order_handle[obj.event] ? order_handle[obj.event].call(this,data) : '';
        }


    })
</script>