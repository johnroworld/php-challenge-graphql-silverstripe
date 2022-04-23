<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\BodyLink;

class BodyLinkAdmin extends ModelAdmin{
    private static $managed_models = [
        BodyLink::class
    ];

    private static $url_segment = 'bodylink';
    private static $menu_title = 'Body Links';
    private static $menu_icon_class = 'font-icon-list';
}