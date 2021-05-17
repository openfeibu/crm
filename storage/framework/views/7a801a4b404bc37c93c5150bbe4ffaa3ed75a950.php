<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(route('order.index')); ?>"><cite><?php echo e(trans('order.title')); ?></cite></a><span lay-separator="">/</span>
            <a><cite><?php echo e(trans('app.edit')); ?><?php echo e(trans('order.name')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('order')); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">选择分类 *</label>
                        <div class="layui-input-inline">
                            <input type="text" name="category_id" id="category_tree" lay-verify="tree" autocomplete="off" placeholder="请选择分类(加载中)" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item fb-form-item2 " id="goods_attributes" style="display:none;">
                        <label class="layui-form-label">选择尺寸 *</label>
                        <div class="fb-form-item-box fb-clearfix">
                            <div class="layui-input-block layui-input-line">
                                <p class="input-p a-select" id="size">

                                </p>
                            </div>
                        </div>
                    </div>

                    <?php echo Form::token(); ?>


                </form>
            </div>
            <div class="table-Box">
                <div class="goods_list">
                    <table class="layui-table" lay-filter="cart" id="cart">
                        <thead>
                        <tr>
                            <th lay-data="{field:'id',width:80}">ID</th>
                            <th lay-data="{field:'goods_name',width:280}">商品名称</th>
                            <th lay-data="{field:'attribute_value'}">尺寸</th>
                            <th lay-data="{field:'selling_price', edit: 'text'}"><?php echo e(trans('goods.label.selling_price')); ?></th>
                            <th lay-data="{field:'weight', edit: 'text'}"><?php echo e(trans('order.label.weight')); ?></th>
                            <th lay-data="{field:'number', edit: 'text'}"><?php echo e(trans('app.number')); ?></th>
                            <th lay-data="{field:'remark', edit: 'text'}"><?php echo e(trans('app.remark')); ?></th>
                            <th lay-data="{field:'freight_category_id', hide:true}">freight_category_id</th>
                            <th lay-data="{field:'list_id', hide:true}">list_id</th>
                            <th lay-data="{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:120, align: 'right',toolbar:'#barDemo'}"><?php echo e(trans('app.actions')); ?></th>
                        </tr>
                        </thead>
                        <tbody id="myTbody">
                            <?php $__currentLoopData = $order_goods_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_goods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order_goods->id); ?></td>
                                    <td><?php echo e($order_goods->goods_name); ?></td>
                                    <td><?php echo e($order_goods->attribute_value); ?></td>
                                    <td><?php echo e($order_goods->selling_price); ?></td>
                                    <td><?php echo e($order_goods->weight); ?></td>
                                    <td><?php echo e($order_goods->number); ?></td>
                                    <td><?php echo e($order_goods->remark); ?></td>
                                    <td><?php echo e($order_goods->freight_category_id); ?></td>
                                    <td><?php echo e($order_goods->goods_id); ?>-<?php echo $order_goods->goods_attribute_value_id ? $order_goods->goods_attribute_value_id : ''; ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <table id="fb-table" class="layui-table"  lay-filter="fb-table">

                </table>
                <div class="fb-main-table">
                    <form class="layui-form" action="" lay-filter="fb-form">
                        <div class="layui-form-item">
                            <label class="layui-form-label"><?php echo e(trans('order.label.weight')); ?></label>
                            <div class="layui-input-inline">
                                <p class="input-p" id="weight"><?php echo e($order['weight']); ?></p>
                            </div>
                        </div>
                        <div class="layui-form-item" id="freight_content">
                            <label class="layui-form-label"><?php echo e(trans('order.label.freight')); ?></label>
                            <div class="layui-input-inline">
                                <p class="input-p" id="freight"><?php echo e($order['freight']); ?></p>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"><?php echo e(trans('goods.label.selling_price')); ?></label>
                            <div class="layui-input-inline">
                                <p class="input-p" id="selling_price"><?php echo e($order['selling_price']); ?></p>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"><?php echo e(trans('order.label.paypal_fee')); ?></label>
                            <div class="layui-input-inline">
                                <p class="input-p" id="paypal_fee"><?php echo e($order['paypal_fee']); ?></p>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label"><?php echo e(trans('order.label.total')); ?></label>
                            <div class="layui-input-inline">
                                <p class="input-p" id="total"><?php echo e($order['total']); ?></p>
                            </div>
                        </div>
                        <div class="layui-form-item fb-form-item">
                            <label class="layui-form-label">客户</label>
                            <div class="fb-form-item-box fb-clearfix">
                                <div class="layui-input-block">
                                    <?php $customerRepository = app('App\Repositories\Eloquent\CustomerRepository'); ?>
                                    <select name="customer_id" id="customer_id" lay-filter="customer" lay-search>
                                        <option value="">请选择客户</option>
                                        <?php $__currentLoopData = $customerRepository->getSalesmanCustomers(Auth::user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customer->id); ?>" <?php if($customer->id == $order->customer_id): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item fb-form-item2">
                            <label class="layui-form-label"><?php echo e(trans('order.label.address')); ?> *</label>
                            <div class="fb-form-item-box" >
                                <div class="layui-input-block" style="width: 410px;">
                                    <textarea name="address" id="address" placeholder="请输入<?php echo e(trans('order.label.address')); ?>" class="layui-textarea"><?php echo $order->address; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="layui-form-item" style="text-align: center;margin-top: 20px;">
                    <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="submit_btn">确认订单</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>
<script>
    var order_id = "<?php echo e($order->id); ?>";
</script>

<?php echo $__env->make('order/category_tree_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('order/handle_cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>

    layui.use(['element',"table",'form',"jquery"], function(){
        var form = layui.form;
        var table = layui.table;
        var upload = layui.upload;
        var $ = layui.$

        var main_url = "<?php echo e(guard_url('order')); ?>";
        table.init('cart', {
            cellMinWidth :'140'
            ,limit:99
            ,done:function(res, curr, count) {

            }
        });
        table.on('tool(cart)', function(obj){
            if(obj.event === 'del'){
                layer.confirm('<?php echo e(trans('messages.confirm_delete')); ?>', function(index){
                    layer.close(index);
                    var load = layer.load();
                    var ajax_data = obj.data;
                    ajax_data['_token'] = "<?php echo csrf_token(); ?>";
                    $.ajax({
                        url : "<?php echo e(guard_url('order_goods')); ?>/"+ajax_data.id,
                        data : ajax_data,
                        type : 'delete',
                        success : function (data) {
                            if(data.code == 0) {
                                layer.closeAll();
                                obj.del();
                                handle_number();
                            }else{
                                layer.closeAll();
                                layer.msg(data.message);
                            }
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            $.ajax_error(jqXHR, textStatus, errorThrown);
                        }
                    });
                    return false;
                })


            }
        });
        //监听提交
        form.on('submit(submit_btn)', function(data){
            var tableData = layui.table.cache.cart;
            var customer_id = $("#customer_id").val();
            var address = $("#address").val();
            if(!tableData)
            {
                layer.msg("请先添加订单产品");
            }
            if(!customer_id || !address)
            {
                layer.msg("客户、地址、业务员必填");
                return false;
            }
            var ajax_data = {'_token':"<?php echo csrf_token(); ?>",customer_id:customer_id,address:address,'carts':tableData};
            var load = layer.load();
            $.ajax({
                url : "<?php echo e(guard_url('order/'.$order->id)); ?>",
                data : ajax_data,
                type : 'PUT',
                success : function (data) {
                    if(data.code == 0) {
                        window.location.href = "<?php echo e(guard_url('order')); ?>"
                    }else{
                        layer.close(load);
                        layer.msg(data.message);
                    }
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    $.ajax_error(jqXHR, textStatus, errorThrown);
                }
            });
            return false;
        });


    });

</script>