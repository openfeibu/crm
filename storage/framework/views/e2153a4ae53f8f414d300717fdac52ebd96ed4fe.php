<div class="main">
    <div class="main_full fb-clearfix" style="margin-top: 15px;">
        <div class="layui-col-md12">
            <div class="layui-card-box layui-col-space15  fb-clearfix">
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>今日销售额</b>
                            <label>(昨日$<?php echo e($yesterday_selling_price); ?>)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">日</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font">$<?php echo e($today_selling_price); ?><span class="<?php echo rate_style($today_selling_price,$yesterday_selling_price); ?>">(<?php echo e(rate_of_increase($today_selling_price,$yesterday_selling_price)); ?>)</span></p>

                        </div>
                    </div>
                </div>
				 <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>今日订单成交量</b>
                            <label>(昨日<?php echo e($yesterday_paid_order_count); ?>)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">日</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($today_paid_order_count); ?><span class="<?php echo rate_style($today_paid_order_count,$yesterday_paid_order_count); ?>">(<?php echo e(rate_of_increase($today_paid_order_count,$yesterday_paid_order_count)); ?>)</span></p>

                        </div>
                    </div>
                </div>
				<div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>今日报价表</b>
                            <label>(昨日<?php echo e($yesterday_order_count); ?>)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">日</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($today_order_count); ?><span class="<?php echo rate_style($today_order_count,$yesterday_order_count); ?>">(<?php echo e(rate_of_increase($today_order_count,$yesterday_order_count)); ?>)</span></p>

                        </div>
                    </div>
                </div>
				 
				   <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>收集客户数</b>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($new_customer_count); ?></p>

                        </div>
                    </div>
                </div>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>总销售额</b>
                            
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font fontColor" >$<?php echo e($selling_price); ?></p>

                        </div>
                    </div>
                </div>
                
               
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>总订单成交量</b>
                            
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font fontColor"><?php echo e($order_paid_count); ?></p>

                        </div>
                    </div>
                </div>
				 <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>总报价表</b>
                            
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font fontColor"><?php echo e($order_count); ?></p>

                        </div>
                    </div>
                </div>
                 <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>客户数</b>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font fontColor"><?php echo e($customer_count); ?></p>

                        </div>
                    </div>
                </div>

              
             
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>待发货</b>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($unshipped_count); ?></p>

                        </div>
                    </div>
                </div>
               
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>产品数</b>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($goods_count); ?></p>

                        </div>
                    </div>
                </div>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>已发营销邮件</b>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($mail_sent_count); ?></p>

                        </div>
                    </div>
                </div>



            </div>

        </div>

        <div class="layui-col-md12">
            <div class="layui-card-box layui-col-space15  fb-clearfix">
				<div class="layui-col-sm12 layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>本月业务员业绩概览</b>
                            <span class="layui-badge layui-bg-red layuiadmin-badge">业绩</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list" style="height:220px">
                            <?php $__currentLoopData = $salesmen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="layui-col-sm3 layui-col-md3">
								<div class="layui-col-sm12 layui-col-md12">
									<div id="Monthly-<?php echo e($salesman['id']); ?>" style="width: 100%;height: 220px;">
									
								
									</div>
								</div>
								
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
				<div class="layui-col-sm12 layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>公司业绩概览</b>
                            <span class="layui-badge layui-bg-red layuiadmin-badge">业绩</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list" style="height:220px">
							<div class="layui-col-sm6 layui-col-md6">
								<div class="layui-col-sm6 layui-col-md6">
									<div id="Monthly-performance" style="width: 100%;height: 220px;"> 
								
								
									</div>
								</div>
								<div class="layui-col-sm6 layui-col-md6 performance-right">
									<div class="t">月业绩目标</div>
                                    <div class="num"><span>$<?php echo e($total_month_performance); ?></span>/$<?php echo e($total_monthly_performance_target); ?></div>
									
								</div>
							</div>
							<div class="layui-col-sm6 layui-col-md6">
								<div class="layui-col-sm6 layui-col-md6">
									<div id="year-performance" style="width: 100%;height: 220px;"> 
								
								
									</div>
								</div>
								<div class="layui-col-sm6 layui-col-md6 performance-right">
									<div class="t">年业绩目标</div>
									<div class="num"><span>$<?php echo e($total_year_performance); ?></span>/$<?php echo e($total_yearly_performance_target); ?></div>
									
								</div>
							</div>
                           
                        </div>
                    </div>
                </div>

            </div>
			
        </div>
	
	
   </div>
   <div class="copy">© CopyRight 2020, 飞步科技, Inc.All Rights Reserved.</div>
</div>


<script>
   layui.use(['jquery','element','form','table','echarts'], function(){
       var form = layui.form;
       var element = layui.element;
       var $ = layui.$;
	   
       //本月业绩
       (function (){
            var echarts = layui.echarts;
            var Monthly_performance = echarts.init(document.getElementById('Monthly-performance'));

		    //指定图表配置项和数据
		    option = {
                tooltip: {
                    trigger: 'item'
                },
                graphic: [  //为环形图中间添加文字
                    {
                        type: "text",
                        left: "center",
                        top: "center",
                        style: {
                            text: "<?php echo e($total_month_performance_percent); ?>",
                            textAlign: "center",
                            fill: "#32373C",
                            fontSize: 28,
                        },
                    },
                ],
                series: [{
                    name: '月业绩目标',
                    type: 'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                      itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                     label: {
                        show: false,
                        position: 'center'
                    },
                    labelLine: {
                        show: false
                    },
                    data: [
                        {value: "<?php echo $total_month_performance; ?>", name: '已完成业绩'},
                        {value: "<?php echo $total_month_performance > $total_monthly_performance_target ? 0 : $total_monthly_performance_target-$total_month_performance; ?>", name: '未完成业绩'},

                    ],
                    color: [
                        new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                            offset: 0,
                            color: 'rgba(250,85,89,0.5)'
                        },
                        {
                            offset: 0.9,
                            color: 'rgba(250,85,89,1)'
                        }]),
                        new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                            offset: 0,
                            color: 'rgba(195,195,195,0.5)'
                        },
                        {
                            offset: 0.9,
                            color: 'rgba(195,195,195,1)'
                        }])
                    ]
                }]
		    };
		    Monthly_performance.setOption(option, true);
       })();
       //本年业绩
       (function (){
            var echarts = layui.echarts;
            var year_performance = echarts.init(document.getElementById('year-performance'));
		    //指定图表配置项和数据
		    option = {
			 
                tooltip: {
                    trigger: 'item'
                },
                graphic: [  //为环形图中间添加文字
                    {
                        type: "text",
                        left: "center",
                        top: "center",
                        style: {
                            text: "<?php echo e($total_year_performance_percent); ?>",
                            textAlign: "center",
                            fill: "#32373C",
                            fontSize: 28,
                        },
                    },
                ],
                series: [
                    {
                        name: '年业绩目标',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        avoidLabelOverlap: false,
                          itemStyle: {
                            borderRadius: 10,
                            borderColor: '#fff',
                            borderWidth: 2
                        },
                         label: {
                            show: false,
                            position: 'center'
                        },
                        labelLine: {
                            show: false
                        },
                        data: [
                            {value: "<?php echo $total_year_performance; ?>", name: '已完成业绩'},
                            {value: "<?php echo $total_year_performance > $total_yearly_performance_target ? 0 : $total_yearly_performance_target-$total_year_performance; ?>", name: '未完成业绩'},

                        ],
                       color: [
                                new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                                    offset: 0,
                                    color: 'rgba(250,85,89,0.5)'
                                },
                                {
                                    offset: 0.9,
                                    color: 'rgba(250,85,89,1)'
                                }]),
                                new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                                    offset: 0,
                                    color: 'rgba(195,195,195,0.5)'
                                },
                                {
                                    offset: 0.9,
                                    color: 'rgba(195,195,195,1)'
                                }])
                         ]
                    }
                ]
		    };
		    year_performance.setOption(option, true);
	   })();

       <?php $__currentLoopData = $salesmen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       //业务员业绩
       (function (){
           var echarts = layui.echarts;
           var echartsDom = echarts.init(document.getElementById('Monthly-<?php echo e($salesman['id']); ?>'));

		   //指定图表配置项和数据
		   option = {
                title: {
                    text: '<?php echo e($salesman['name']); ?>',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                graphic: [  //为环形图中间添加文字
                    {
                        type: "text",
                        left: "center",
                        top: "center",
                        style: {
                            text: "<?php echo e($salesman['month_performance_percent']); ?>",
                            textAlign: "center",
                            fill: "#32373C",
                            fontSize: 28,
                        },
                    },
                ],
                series: [
                    {
                        name: '月业绩目标',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        avoidLabelOverlap: false,
                            itemStyle: {
                            borderRadius: 10,
                            borderColor: '#fff',
                            borderWidth: 2
                        },
                        label: {
                            show: false,
                            position: 'center'
                        },
                        labelLine: {
                            show: false
                        },
                        data: [
                            {value: '<?php echo $salesman['month_performance']; ?>', name: '已完成业绩'},
                            {value: '<?php echo $salesman['month_performance'] > $salesman['monthly_performance_target'] ? 0 : $salesman['monthly_performance_target']-$salesman['month_performance']; ?>', name: '未完成业绩'},

                        ],
                        color: [
                            new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                                offset: 0,
                                color: 'rgba(250,85,89,0.5)'
                            },
                            {
                                offset: 0.9,
                                color: 'rgba(250,85,89,1)'
                            }]),
                            new echarts.graphic.LinearGradient(1, 1, 0, 0, [{
                                offset: 0,
                                color: 'rgba(195,195,195,0.5)'
                            },
                            {
                                offset: 0.9,
                                color: 'rgba(195,195,195,1)'
                            }])
                         ]
                    }
                ]
           };
		   echartsDom.setOption(option, true);
	   })();
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   });
</script>