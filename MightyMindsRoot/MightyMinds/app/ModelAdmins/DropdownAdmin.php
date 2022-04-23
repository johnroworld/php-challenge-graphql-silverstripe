<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Dropdown;

class DropdownAdmin extends ModelAdmin{
    private static $managed_models = [
        Dropdown::class
    ];

    private static $url_segment = 'dropdown';
    private static $menu_title = 'Dropdown';
    private static $menu_icon_class = 'font-icon-list';
}