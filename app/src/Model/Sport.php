<?php

namespace Sportsing\Model;

use SilverStripe\ORM\DataObject;

class Sport extends DataObject
{
    private static $table_name = 'Sport';

    private static $db = [
        'Title' => 'Varchar',
        'Season' => "Enum(array('Summer', 'Winter'), 'Winter')"
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Season' => 'Season',
    ];

    private static $indexes = [
        'Season' => [
            'columns' => ['Season'],
        ],
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
