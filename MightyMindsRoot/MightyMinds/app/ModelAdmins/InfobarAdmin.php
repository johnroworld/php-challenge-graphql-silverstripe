<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Infobar;

class InfobarAdmin extends ModelAdmin{
    private static $managed_models = [
        Infobar::class
    ];

    private static $url_segment = 'infobar';
    private static $menu_title = 'Info Bar';
    private static $menu_icon_class = 'font-icon-list';
}