<?php 

use SilverStripe\ORM\DataExtension;

class MemberFieldExtension extends DataExtension 
{

    private static $db = [
        'SchoolName' => 'Varchar',
        'SchoolID' => 'Int',
        'IsSchoolAdmin' => 'Boolean'
    ];

}