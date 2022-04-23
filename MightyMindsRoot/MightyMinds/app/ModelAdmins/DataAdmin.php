<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Data;

class DataAdmin extends ModelAdmin{
    private static $managed_models = [
        Data::class
    ];

    private static $url_segment = 'data';
    private static $menu_title = 'Data';
    private static $menu_icon_class = 'font-icon-list';
}