<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\GridURL;

class GridURLAdmin extends ModelAdmin{
    private static $managed_models = [
        GridURL::class
    ];

    private static $url_segment = 'grid-urls';
    private static $menu_title = 'Grid URL';
    private static $menu_icon_class = 'font-icon-list';
}