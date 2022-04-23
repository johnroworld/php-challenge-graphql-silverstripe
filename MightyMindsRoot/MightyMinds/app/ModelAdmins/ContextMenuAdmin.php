<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\ContextMenu;

class ContextMenuAdmin extends ModelAdmin{
    private static $managed_models = [
        ContextMenu::class
    ];

    private static $url_segment = 'context-menu';
    private static $menu_title = 'Context Menu';
    private static $menu_icon_class = 'font-icon-list';
}