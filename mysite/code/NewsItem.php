<?php

class NewsItem extends Page
{
    private static $db = array(
        'Description' => 'Text',
        'Subtitle' => 'Text',
        'SubDescription' => 'Text',
    );

    private static $has_one = array(
        'Photo' => 'Image',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields -> addFieldToTab('Root.Other', TextField::create('Description', 'A Description for this Page'));
        $fields -> addFieldToTab('Root.Other', TextField::create('Subtitle', 'A Subtitle for this Page'));
        $fields -> addFieldToTab('Root.Other', TextField::create('SubDescription', 'A SubDescription for this Page'));
        $fields -> addFieldToTab('Root.Attachments', $photo = UploadField::create('Photo'));

        $photo->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        return $fields;
    }
}
