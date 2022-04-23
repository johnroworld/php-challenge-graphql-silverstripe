<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Classes;

class ClassesAdmin extends ModelAdmin{
    private static $managed_models = [
        Classes::class
    ];

    private static $url_segment = 'classes';
    private static $menu_title = 'Classes';
    private static $menu_icon_class = 'font-icon-list';
}