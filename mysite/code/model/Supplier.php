<?php

class Supplier extends DataObject
{
    private static $db = array(
        'Name' => 'Varchar(50)',
        'Location' => 'Varchar(50)',
        'Description' => 'Varchar(50)',
    );

    private static $has_one = array(
        'Photo' => 'Image',
    );

    private static $belongs_many_many = array(
        "RestaurantArticles" => "RestaurantArticle"
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