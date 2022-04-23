<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Dropdowns;

class DropdownsAdmin extends ModelAdmin{
    private static $managed_models = [
        Dropdowns::class
    ];

    private static $url_segment = 'dropdowns';
    private static $menu_title = 'Dropdowns';
    private static $menu_icon_class = 'font-icon-list';
}