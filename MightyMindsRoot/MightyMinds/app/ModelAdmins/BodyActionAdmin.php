<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\BodyAction;

class BodyActionAdmin extends ModelAdmin{
    private static $managed_models = [
        BodyAction::class
    ];

    private static $url_segment = 'body-action';
    private static $menu_title = 'Body Action';
    private static $menu_icon_class = 'font-icon-list';
}