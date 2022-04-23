<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Content;

class ContentAdmin extends ModelAdmin{
    private static $managed_models = [
        Content::class
    ];

    private static $url_segment = 'contents';
    private static $menu_title = 'Content';
    private static $menu_icon_class = 'font-icon-list';
}