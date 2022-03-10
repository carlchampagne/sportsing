<?php

namespace Sportsing\Admin;

use Sportsing\Model\Sport;
use SilverStripe\Admin\ModelAdmin;

class SportAdmin extends ModelAdmin
{
    private static $managed_models = [
        Sport::class,
    ];

    private static $menu_title = 'Sports';

    private static $url_segment = 'sports';
}
