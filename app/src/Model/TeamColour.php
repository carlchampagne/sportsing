<?php

namespace Sportsing\Model;

use SilverStripe\ORM\DataObject;

class TeamColour extends DataObject
{
    private static $table_name = 'TeamColour';

    private static $db = [
        'Title' => 'Varchar'
    ];

    private static $summary_fields = [
        'Title' => 'Title',
    ];

    private static $default_sort = "Title";

    public function validate()
    {
        $validate = parent::validate();

        if (empty($this->Title)) {
            $validate->addFieldError('Title', 'Title is required');
        }

        return $validate;
    }
}
