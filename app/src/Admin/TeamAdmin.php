<?php

namespace Sportsing\Admin;

use Sportsing\Model\Team;
use SilverStripe\Admin\ModelAdmin;

class TeamAdmin extends ModelAdmin
{
    private static $managed_models = [
        Team::class,
    ];

    private static $menu_title = 'Teams';

    private static $url_segment = 'teams';
}
