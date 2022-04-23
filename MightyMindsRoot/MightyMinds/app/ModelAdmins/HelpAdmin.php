<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Help;

class HelpAdmin extends ModelAdmin{
    private static $managed_models = [
        Help::class
    ];

    private static $url_segment = 'help';
    private static $menu_title = 'Help';
    private static $menu_icon_class = 'font-icon-list';
}