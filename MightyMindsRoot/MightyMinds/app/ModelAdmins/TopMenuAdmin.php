<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\TopMenu;

class TopMenuAdmin extends ModelAdmin{
    private static $managed_models = [
        TopMenu::class
    ];

    private static $url_segment = 'topmenu';
    private static $menu_title = 'Top Menu';
    private static $menu_icon_class = 'font-icon-list';
}