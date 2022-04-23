<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\URL;

class URLAdmin extends ModelAdmin{
    private static $managed_models = [
        URL::class
    ];

    private static $url_segment = 'urls';
    private static $menu_title = 'URL';
    private static $menu_icon_class = 'font-icon-list';
}