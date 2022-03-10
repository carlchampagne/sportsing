<?php

namespace Sportsing\Task;

use Sportsing\Model\Sport;
use Sportsing\Model\Sportsman;
use Sportsing\Model\Team;
use Sportsing\Model\TeamColour;
use SilverStripe\Dev\BuildTask;
use SilverStripe\ORM\DB;

class ImportTestDataTask extends BuildTask
{
    private static $segment = 'ImportTestDataTask';

    private $teamColourList = ['Black', 'Blue', 'Yellow'];

    private $sportList = [['Rugby', 'Winter'], ['Cricket', 'Summer']];

    private $teamList = [
                           ['Black Caps', '', 'National', 'Cricket', 'Black'],
                           ['Auckland Blues', 'Blue Beard', 'Regional', 'Rugby', 'Blue'],
                           ['All Blacks', 'Buck Shelford', 'National', 'Rugby', 'Black'],
                           ['Wellington Hurricanes', 'Captain Hurricane', 'Regional', 'Rugby', 'Yellow']
                        ];

    private $sportsmanList = [
                               ['Martin', 'Crowe', ['Black Caps']],
                               ['Frank', 'Bunce', ['Auckland Blues', 'All Blacks']],
                               ['Jeff', 'Wilson', ['Wellington Hurricanes', 'All Blacks', 'Black Caps']],
                             ];

    public function run($request)
    {

        // ************************************************************************************
        // Import Team Colours
        // ************************************************************************************

        foreach ($this->teamColourList as $colour) {
           $teamColourObject = TeamColour::get()->filter('Title', $colour)->first();
           if (!$teamColourObject) {
                $teamColourObject = TeamColour::create();
                $teamColourObject->Title = $colour;
                $teamColourObject->write();

                echo 'Added ';
           }
           else
                echo 'Skipped ';
           echo 'Team Colour: <b>' . $colour . "</b><br />";
        }

        echo '<br /><br />';


        // ************************************************************************************
        // Import Sports
        // ************************************************************************************

        foreach ($this->sportList as $sport) {
           $sportObject = Sport::get()->filter('Title', $sport[0])->first();
           if (!$sportObject) {
                $sportObject = Sport::create();
                $sportObject->Title = $sport[0];

                echo 'Added ';
           }
           else {
                echo 'Updated ';
           }

           $sportObject->Season = $sport[1];
           $sportObject->write();

           echo 'Sport: <b>' . $sport[0] . "</b><br />";
        }

        echo '<br /><br />';


        // ************************************************************************************
        // Import Teams
        // ************************************************************************************

        foreach ($this->teamList as $team) {
           $teamObject = Team::get()->filter('Name', $team[0])->first();
           if (!$teamObject) {
                $teamObject = Team::create();
                $teamObject->Name = $team[0];

                echo 'Added ';
           }
           else {
                echo 'Updated ';
           }

           $teamObject->MascotName = $team[1];
           $teamObject->Scope = $team[2];
           $teamObject->Sport = Sport::get()->filter('Title', $team[3])->first()->ID;
           $teamObject->TeamColour = TeamColour::get()->filter('Title', $team[4])->first()->ID;
           $teamObject->write();

           echo 'Team: <b>' . $team[0] . "</b><br />";
        }

        echo '<br /><br />';


        // ************************************************************************************
        // Import Sportsmen and attach to teams
        // ************************************************************************************

        foreach ($this->sportsmanList as $sportsman) {
           $sportsmanObject = Sportsman::get()->filter(['FirstName' => $sportsman[0], 'LastName' => $sportsman[1]])->first();
           if (!$sportsmanObject) {
                $sportsmanObject = Sportsman::create();
                $sportsmanObject->FirstName = $sportsman[0];
                $sportsmanObject->LastName = $sportsman[1];
                $sportsmanObject->write();

                echo 'Added ';
           }
           else {
                echo 'Updated ';
           }

           foreach($sportsman[2] as $team) {
                $teamObject = Team::get()->filter('Name', $team)->first();
                $sportsmanObject->Teams()->add($teamObject);
           }

           echo 'Sportsman: <b>' . $sportsman[0] . ' ' . $sportsman[1] . "</b><br />";
        }

        echo '<br /><br />';
    }
}
