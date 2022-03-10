<?php

namespace Sportsing\Admin;

use Sportsing\Model\Sportsman;
use SilverStripe\Admin\ModelAdmin;

class SportsmanAdmin extends ModelAdmin
{
    private static $managed_models = [
        Sportsman::class,
    ];

    private static $menu_title = 'Sportsmen';

    private static $url_segment = 'sportsmen';
}
