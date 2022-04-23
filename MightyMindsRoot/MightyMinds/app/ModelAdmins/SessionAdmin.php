<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Session;

class SessionAdmin extends ModelAdmin{
    private static $managed_models = [
        Session::class
    ];

    private static $url_segment = 'session';
    private static $menu_title = 'Class Session';
    private static $menu_icon_class = 'font-icon-list';
}