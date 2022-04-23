<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\ClassMenu;

class ClassMenuAdmin extends ModelAdmin{
    private static $managed_models = [
        ClassMenu::class
    ];

    private static $url_segment = 'class-menus';
    private static $menu_title = 'Class Menu';
    private static $menu_icon_class = 'font-icon-list';
}