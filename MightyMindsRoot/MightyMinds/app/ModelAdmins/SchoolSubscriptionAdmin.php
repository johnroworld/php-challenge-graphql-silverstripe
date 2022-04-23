<?php

namespace MyProject\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use MyProject\DataObjects\SchoolSubscription;

class SchoolSubscriptionAdmin extends ModelAdmin{
    private static $managed_models = [
        SchoolSubscription::class
    ];

    private static $url_segment = 'school-subscription';
    private static $menu_title = 'School Subscription';
    private static $menu_icon_class = 'font-icon-list';
}