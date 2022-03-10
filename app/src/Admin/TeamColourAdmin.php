<?php

namespace Sportsing\Admin;

use Sportsing\Model\TeamColour;
use SilverStripe\Admin\ModelAdmin;

class TeamColourAdmin extends ModelAdmin
{
    private static $managed_models = [
        TeamColour::class,
    ];

    private static $menu_title = 'Team Colours';

    private static $url_segment = 'team-colours';
}
