<?php

class Supplier extends DataObject
{
    private static $db = array(
        'Name' => 'Text',
        'Location' => 'Text',
        'Description' => 'Text',
    );

    private static $has_one = array(
        'Photo' => 'Image',
    );

    private static $summary_fields = array (
        'Name' => 'Supplier Trade Name',
        'Location' => 'Supplier Location',
        'Description' => 'Description',
    );

    public function getCMSFields() {
        $fields = FieldList::create(
            TextField::create('Name'),
            TextField::create('Location'),
            TextAreaField::create('Description')
        );
        return $fields;
    }
}