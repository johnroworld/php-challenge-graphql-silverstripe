<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\ClassesData;

class ClassesDataAdmin extends ModelAdmin{
    private static $managed_models = [
        ClassesData::class
    ];

    private static $url_segment = 'classes-data';
    private static $menu_title = 'Classes Data';
    private static $menu_icon_class = 'font-icon-list';
}