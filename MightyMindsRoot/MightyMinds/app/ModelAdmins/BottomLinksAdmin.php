<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\BottomLinks;

class BottomLinksAdmin extends ModelAdmin{
    private static $managed_models = [
        BottomLinks::class
    ];

    private static $url_segment = 'bottom-links';
    private static $menu_title = 'Bottom Link';
    private static $menu_icon_class = 'font-icon-list';
}