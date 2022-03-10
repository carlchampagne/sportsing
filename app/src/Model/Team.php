<?php

namespace Sportsing\Model;

use Sportsing\Model\Sport;
use Sportsing\Model\Sportsman;
use Sportsing\Model\TeamColour;
use SilverStripe\ORM\DataObject;
use Silverstripe\Assets\Image;

class Team extends DataObject
{
    private static $table_name = 'Team';

    private static $db = [
        'Name' => 'Varchar',
        'MascotName' => 'Varchar',
        'Scope' => "Enum(array('National', 'Regional'), 'Regional')",
    ];

    private static $has_one = [
        'Sport' => Sport::class,
        'TeamColour' => TeamColour::class,
        'Logo' => Image::class
    ];

    private static $many_many = [
        'Sportsmen' => Sportsman::class
    ];

    private static $summary_fields = [
        'Logo.StripThumbnail' => 'Logo',
        'Name' => 'Name',
    ];

    private static $indexes = [
        'Scope' => [
            'columns' => ['Scope'],
        ],
    ];

    private static $default_sort = "Name";

    public function validate()
    {
        $validate = parent::validate();

        if (empty($this->Title)) {
            $validate->addFieldError('Name', 'Name is required');
        }

        return $validate;
    }
}
