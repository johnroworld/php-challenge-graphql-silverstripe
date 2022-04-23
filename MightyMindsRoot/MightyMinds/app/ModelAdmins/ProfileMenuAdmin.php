<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\ProfileMenu;

class ProfileMenuAdmin extends ModelAdmin{
    private static $managed_models = [
        ProfileMenu::class
    ];

    private static $url_segment = 'profilemenu';
    private static $menu_title = 'Profile Menu';
    private static $menu_icon_class = 'font-icon-list';
}