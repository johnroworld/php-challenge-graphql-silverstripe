<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Home;

class HomeAdmin extends ModelAdmin{
    private static $managed_models = [
        Home::class
    ];

    private static $url_segment = 'home';
    private static $menu_title = 'Home';
    private static $menu_icon_class = 'font-icon-list';
}