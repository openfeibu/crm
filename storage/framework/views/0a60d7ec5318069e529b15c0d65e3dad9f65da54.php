<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="logo"><img src="<?php echo e(url('/image/original').setting('logo')); ?>" /></div>
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
            
            <?php $permissionPresenter = app('App\Repositories\Presenter\PermissionPresenter'); ?>

            <?php echo $permissionPresenter->menus(); ?>

        </ul>

    </div>
</div>

<!-- 左侧菜单结束 -->

