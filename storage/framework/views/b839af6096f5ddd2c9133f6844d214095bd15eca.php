<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="<?php echo e(guard_url('home')); ?>"><?php echo e(trans('app.home')); ?></a><span lay-separator="">/</span>
            <a href="<?php echo e(guard_url('new_customer')); ?>"><cite><?php echo e(trans('new_customer.title')); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <form class="layui-form" action="" lay-filter="fb-form">
                    <div class="layui-block mb10">
                        <div class="layui-inline tabel-btn">
                            <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('new_customer/create')); ?>"><?php echo e(trans('app.add')); ?> <?php echo e(trans('new_customer.name')); ?></a></button>
                            <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('new_customer_import')); ?>">批量上传</a></button>
                            <button class="layui-btn layui-btn-danger " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                            <button class="layui-btn layui-btn-primary " type="button" data-type="send_mail" data-events="send_mail">发送 Email</button>
                        </div>
                    </div>
                    <div class="layui-block mb10">
                        <div class="layui-inline">
                            <input class="layui-input search_key" name="nickname" id="demoReload" placeholder="<?php echo e(trans('new_customer.label.nickname')); ?>" autocomplete="off">
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
                            <label class="layui-form-label">过滤空邮箱</label>
                            <input type="checkbox" class="search_key" name="email_not_null" placeholder="过滤空邮箱" lay-skin="switch" lay-text="ON|OFF" value="0" lay-filter="email_not_null">
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
<div class="new_customer_send_mail_content" style="display: none">
    <form class="layui-form send_mail_form" action="" style="margin: 10px 10px ">
        <div><p>计划发送共：<span id="mail_count">0</span>封</p></div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo e(trans('mail_account.name')); ?></label>
            <div class="layui-input-block">
                <?php $mailAccountRepository = app('App\Repositories\Eloquent\MailAccountRepository'); ?>
                <?php $__currentLoopData = $mailAccountRepository->where('salesman_id',Auth::user()->id)->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="checkbox" name="account_ids" title="<?php echo e($account->username); ?>" value="<?php echo e($account->id); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo e(trans('mail_template.name')); ?></label>
            <div class="layui-input-block">
                <?php $mailTemplateRepository = app('App\Repositories\Eloquent\MailTemplateRepository'); ?>
                <?php $__currentLoopData = $mailTemplateRepository->where('salesman_id',Auth::user()->id)->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="checkbox" name="template_ids" title="<?php echo e($template->name); ?>" value="<?php echo e($template->id); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.title')); ?> *</label>
            <div class="layui-input-inline">
                <input type="text" name="title" autocomplete="off" placeholder="请输入 <?php echo e(trans('mail_schedule.label.title')); ?>" class="layui-input" value="<?php echo e(config('model.mail.mail_schedule.title')); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.interval')); ?> *</label>
            <div class="layui-input-inline">
                <input type="text" name="interval" autocomplete="off" placeholder="请输入 <?php echo e(trans('mail_schedule.label.interval')); ?>" class="layui-input" value="<?php echo e(config('model.mail.mail_schedule.interval')); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo e(trans('mail_schedule.label.per_hour_mail')); ?> *</label>
            <div class="layui-input-inline">
                <input type="text" name="per_hour_mail" autocomplete="off" placeholder="请输入 <?php echo e(trans('mail_schedule.label.per_hour_mail')); ?>" class="layui-input" value="<?php echo e(config('model.mail.mail_schedule.per_hour_mail')); ?>">
            </div>
        </div>
        <div class="layui-form-item fb-form-item2">
            <label class="layui-form-label"><?php echo e(trans('mail_template.label.active')); ?> *</label>

            <div class="layui-input-block">
                <input type="checkbox" name="active" value="1" lay-skin="switch" lay-text="是|否" lay-filter="active" class="active" checked>
            </div>

        </div>
    </form>
</div>
<script type="text/html" id="barDemo">
    {{# if(d.mark == 'new'){ }}
    <a class="layui-btn layui-btn-sm" href="<?php echo e(guard_url('customer/create')); ?>?new_customer_id={{ d.id }}">下单客户</a>
    {{# } }}
    <a class="layui-btn layui-btn-sm" href="<?php echo e(guard_url('new_customer')); ?>/{{ d.id }}"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>

<script>
    var main_url = "<?php echo e(guard_url('new_customer')); ?>";
    var delete_all_url = "<?php echo e(guard_url('new_customer/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        var element = layui.element;
        form.render();
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('new_customer')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80}
                //,{field:'salesman_name',title:'<?php echo e(trans('salesman.label.name')); ?>',width:100}
                ,{field:'ig',title:'<?php echo e(trans('new_customer.label.ig')); ?>',templet:'<div><a href="https://www.instagram.com/{{ d.ig }}" target="_blank">{{ d.ig }}</a></div>'}
                ,{field:'ig_follower_count',title:'<?php echo e(trans('new_customer.label.ig_follower_count')); ?>',edit:'text', width:100}
                ,{field:'ig_sec',title:'<?php echo e(trans('new_customer.label.ig_sec')); ?>',templet:'<div>{{# if(d.ig_sec){ }}<a href="https://www.instagram.com/{{ d.ig_sec }}" target="_blank">{{ d.ig_sec }}</a>{{# }  }}</div>', width:120}
                ,{field:'mobile',title:'<?php echo e(trans('new_customer.label.mobile')); ?>', width:160,edit:'text'}
                ,{field:'whatsapp',title:'<?php echo e(trans('new_customer.label.whatsapp')); ?>', width:160,edit:'text'}
                ,{field:'imessage',title:'<?php echo e(trans('new_customer.label.imessage')); ?>', width:160,edit:'text'}
                ,{field:'email',title:'<?php echo e(trans('new_customer.label.email')); ?>',edit:'text'}
                ,{field:'facebook',title:'<?php echo e(trans('new_customer.label.facebook')); ?>',edit:'text'}
                ,{field:'nickname',title:'<?php echo e(trans('new_customer.label.nickname')); ?>',edit:'text'}
                ,{field:'company_website',title:'<?php echo e(trans('new_customer.label.company_website')); ?>',edit:'text'}
                ,{field:'company_name',title:'<?php echo e(trans('new_customer.label.company_name')); ?>',edit:'text'}
                ,{field:'main_product',title:'<?php echo e(trans('new_customer.label.main_product')); ?>',edit:'text'}
                ,{field:'mail_report_date',title:'<?php echo e(trans('mail_schedule_report.name')); ?>'}
                ,{field:'created_at',title:'<?php echo e(trans('app.created_at')); ?>'}
                ,{field:'mark_desc',title:'<?php echo e(trans('new_customer.label.mark')); ?>', width:100}
                ,{field:'remark',title:'<?php echo e(trans('new_customer.label.remark')); ?>', width:120,edit:'text', fixed: 'right'}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:240, align: 'right',toolbar:'#barDemo', fixed: 'right'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: '<?php echo e(config('app.limit')); ?>'
            ,height: 'full-200'
            ,cellMinWidth :'180'
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
        var element = layui.element;
        active.send_mail = function () {
            var load = layer.load();
            //判断有效邮箱数量
            var checkStatus = table.checkStatus('fb-table')
                    ,data = checkStatus.data;
            var data_id_obj = {};
            var ajax_data = {'_token':"<?php echo csrf_token(); ?>"};
            var i = 0;
            var count = 0;
            var ids = [];
            data.forEach(function(v){
                ids.push(v.id);
                count++;
            });
            $(".search_key").each(function(){
                var name = $(this).attr('name');
                ajax_data["search["+name+"]"] = $(this).val();
            });
            ajax_data['ids'] = ids;
            $.ajax({
                url : "<?php echo e(guard_url('new_customer/mail/count')); ?>",
                data : ajax_data,
                type : 'GET',
                success : function (data) {
                    layer.close(load);
                    if(data.code == 0) {
                        var mail_count = data.data.count;
                        $("#mail_count").html(mail_count);

                        layer.open({
                            type: 1,
                            shade: false,
                            title: '<?php echo e(trans('app.add')); ?>', //不显示标题
                            area: ['620px', '440px'], //宽高
                            content: $('.new_customer_send_mail_content'),
                            btn:['<?php echo e(trans('app.submit')); ?>'],
                            btn1:function()
                            {
                                var account_ids = [];
                                $('input[name=account_ids]:checked').each(function() {
                                    account_ids.push($(this).val());
                                });
                                var template_ids = [];
                                $('input[name=template_ids]:checked').each(function() {
                                    template_ids.push($(this).val());
                                });
                                var active = 0;
                                if($(".active").prop("checked")){
                                    active = 1;
                                }
                                if(account_ids.length === 0)
                                {
                                    layer.msg("请选择<?php echo e(trans('mail_account.name')); ?>");
                                    return false;
                                }
                                if(template_ids.length === 0)
                                {
                                    layer.msg("请选择<?php echo e(trans('mail_template.name')); ?>");
                                    return false;
                                }

                                ajax_data['active'] = active;
                                ajax_data['account_ids'] = account_ids;
                                ajax_data['template_ids'] = template_ids;
                                ajax_data['interval'] = $('input[name=interval]').val();
                                ajax_data['per_hour_mail'] = $('input[name=per_hour_mail]').val();
                                ajax_data['title'] = $('input[name=title]').val();
                                var load =layer.load();
                                $.ajax({
                                    url : "<?php echo e(guard_url('mail_schedule/send/new_customer')); ?>",
                                    data : ajax_data,
                                    type : 'POST',
                                    success : function (data) {
                                        layer.close(load);
                                        if(data.code == 0) {
                                            window.location.href=data.url;
                                        }else{
                                            layer.msg(data.message);
                                        }
                                    },
                                    error : function (jqXHR, textStatus, errorThrown) {
                                        layer.close(load);
                                        $.ajax_error(jqXHR, textStatus, errorThrown);
                                    }
                                });
                            }
                        });
                    }else{
                        layer.msg(data.message);
                    }
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    $.ajax_error(jqXHR, textStatus, errorThrown);
                }
            });


        }
        form.on('switch(email_not_null)', function(data) {
            $(data.elem).attr('type', 'hidden').val(this.checked ? 1 : 0);
        });
    })
</script>