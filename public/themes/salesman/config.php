<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
     */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | List view for the theme
    |--------------------------------------------------------------------------
    |
    | Here you can specify which view is to be loaded for the list page
    | this can be 'list', 'grid', 'box', 'bootstrap-table' or 'data-table'
    |
    | You can specify additional views but you have to create it under 
    | 'patrial/list' folder of each package that uses this theme.
    |
     */

    'listView' => 'data-table', //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
     */
 
    'events'  => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before'             => function ($theme) {
            // You can remove this line anytime.
            // $theme->setTitle(__('app.name'));

        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme'  => function ($theme) {
            $theme->asset()->add('layui_css', 'lib/layui/css/layui.css');
            //$theme->asset()->usePath()->add('main_css', 'css/main.css');
            $theme->asset()->add('main_css', 'css/admin/main.css');
            $theme->asset()->container('footer')->add('iconfont_js', '/fonts/iconfont.js');
            $theme->asset()->container('footer')->add('layui_js', 'lib/layui/layui.js');
            $theme->asset()->container('footer')->add('layui_module_js', 'lib/layui/module/common.js');
            $theme->asset()->container('footer')->usePath()->add('main_js', 'js/main.js');

            $theme->asset()->container('ueditor')->add('ueditor_config','lib/ueditor/ueditor.config.js');
            $theme->asset()->container('ueditor')->add('ueditor_js','lib/ueditor/ueditor.all.js');
            $theme->asset()->container('ueditor')->add('ueditor_lang','lib/ueditor/lang/zh-cn/zh-cn.js');
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [
            'auth' => function($theme)
            {
                $theme->asset()->usePath()->add('auth', 'css/auth.css');
            }

        ],
    ],

];
