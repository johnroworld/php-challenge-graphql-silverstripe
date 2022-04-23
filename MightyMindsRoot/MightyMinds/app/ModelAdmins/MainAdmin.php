<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Main;

class MainAdmin extends ModelAdmin{
    private static $managed_models = [
        Main::class
    ];

    private static $url_segment = 'main';
    private static $menu_title = 'Main';
    private static $menu_icon_class = 'font-icon-list';
}