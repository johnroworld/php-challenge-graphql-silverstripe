<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Body;

class BodyAdmin extends ModelAdmin{
    private static $managed_models = [
        Body::class
    ];

    private static $url_segment = 'body';
    private static $menu_title = 'Body';
    private static $menu_icon_class = 'font-icon-list';
}