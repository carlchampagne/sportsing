<?php

namespace Sportsing\Model;

use Sportsing\Model\Team;
use SilverStripe\ORM\DataObject;

class Sportsman extends DataObject
{
    private static $table_name = 'Sportsman';

    private static $db = [
        'FirstName' => 'Varchar',
        'LastName' => 'Varchar'
    ];

    private static $belongs_many_many = [
        'Teams' => Team::class
    ];

    private static $summary_fields = [
        'LastName' => 'Last Name',
        'FirstName' => 'First Name',
    ];

    private static $default_sort = "LastName, FirstName";

    public function validate()
    {
        $validate = parent::validate();

        if (empty($this->Title)) {
            $validate->addFieldError('Name', 'Name is required');
        }

        return $validate;
    }
}
