<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\WidgetURL;

class WidgetURLAdmin extends ModelAdmin{
    private static $managed_models = [
        WidgetURL::class
    ];

    private static $url_segment = 'widget-urls';
    private static $menu_title = 'Widget URL';
    private static $menu_icon_class = 'font-icon-list';
}