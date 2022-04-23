<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\Report;

class ReportAdmin extends ModelAdmin{
    private static $managed_models = [
        Report::class
    ];

    private static $url_segment = 'report';
    private static $menu_title = 'Report';
    private static $menu_icon_class = 'font-icon-list';
}