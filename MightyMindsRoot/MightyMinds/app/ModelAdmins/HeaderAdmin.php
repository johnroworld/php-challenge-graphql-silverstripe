<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Header;

class HeaderAdmin extends ModelAdmin{
    private static $managed_models = [
        Header::class
    ];

    private static $url_segment = 'header';
    private static $menu_title = 'Header';
    private static $menu_icon_class = 'font-icon-list';
}