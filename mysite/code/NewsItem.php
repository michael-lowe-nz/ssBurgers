<?php

class NewsItem extends Page
{
    private static $db = array(
        'Description' => 'Text',
        'Subtitle' => 'Text',
        'SubDescription' => 'Text',
    );

    private static $has_many = array(
        'MenuItems' => 'MenuItem'
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
        $fields->addFieldToTab('Root.MenuItems', GridField::create(
            'MenuItems',
            'Menu Items on this Page',
            $this->MenuItems(),
            GridFieldConfig_RecordEditor::create()
        ));

        $photo->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        return $fields;
    }
}

class RegionsPage_Controller extends Page_Controller {

}
