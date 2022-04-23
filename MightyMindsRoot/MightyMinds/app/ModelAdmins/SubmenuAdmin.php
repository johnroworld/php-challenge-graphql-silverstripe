<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Submenu;

class SubmenuAdmin extends ModelAdmin{
    private static $managed_models = [
        Submenu::class
    ];

    private static $url_segment = 'submenu';
    private static $menu_title = 'Sub Menu';
    private static $menu_icon_class = 'font-icon-list';
}