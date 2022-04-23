<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Teacher;

class TeacherpAdmin extends ModelAdmin{
    private static $managed_models = [
        Teacher::class
    ];

    private static $url_segment = 'teacher';
    private static $menu_title = 'Teacher';
    private static $menu_icon_class = 'font-icon-list';
}