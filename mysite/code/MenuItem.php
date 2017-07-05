<?php

class MenuItem extends DataObject
{
    private static $db = array(
        'Name' => 'Text',
        'Price' => 'Text',
        'Description' => 'Text',
    );

    private static $has_one = array(
        'Photo' => 'Image',
        'NewsItem' => 'NewsItem'
    );

    public function getCMSFields() {
        $fields = FieldList::create(
            TextField::create('Name'),
            TextField::create('Price'),
            TextAreaField::create('Description'),
            $uploader = UploadField::create('Photo')
        );

        $uploader->setFolderName('region-photos');
        $uploader->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));

        return $fields;
    }
}