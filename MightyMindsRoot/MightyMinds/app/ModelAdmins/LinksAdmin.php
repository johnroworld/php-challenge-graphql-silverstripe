<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Links;

class ItemAdmin extends ModelAdmin{
    private static $managed_models = [
        Links::class
    ];

    private static $url_segment = 'Link';
    private static $menu_title = 'Link';
    private static $menu_icon_class = 'font-icon-list';
}