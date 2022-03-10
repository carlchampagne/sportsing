<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;

    use Sportsing\Model\Team;
    use Sportsing\Model\TeamColour;
    use Sportsing\Model\Sport;
    use Sportsing\Model\Sportsman;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [];

        function Team($name) {
            if (!is_string($name))
                return false;

            $team = Team::get()->filter('Name', $name)->first();

            return $team;
        }

        function Sportsman($firstName, $lastName) {
            if (!is_string($firstName) || !is_string($lastName))
                return false;

            $sportsman = Sportsman::get()->filter(['FirstName' => $firstName, 'LastName' => $lastName])->first();

            return $sportsman;
        }
    }
}
