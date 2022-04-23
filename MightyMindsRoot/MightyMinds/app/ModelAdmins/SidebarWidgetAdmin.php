<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\SidebarWidget;

class SidebarWidgetAdmin extends ModelAdmin{
    private static $managed_models = [
        SidebarWidget::class
    ];

    private static $url_segment = 'sidebar-widgets';
    private static $menu_title = 'Sidebar Widgets';
    private static $menu_icon_class = 'font-icon-list';
}