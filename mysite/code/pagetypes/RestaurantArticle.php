<?php

class RestaurantArticle extends Page
{
    private static $db = array(
        'Description' => 'Varchar(50)',
        'Subtitle' => 'Varchar(50)',
        'SubDescription' => 'Varchar(50)',
    );

    private static $has_many = array(
        'MenuItems' => 'MenuItem',
    );

    private static $many_many = array(
      'Suppliers' => 'Supplier'
    );

    private static $has_one = array(
        'Photo' => 'Image',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Other', TextField::create('Description', 'A Description for this Page'));
        $fields->addFieldToTab('Root.Other', TextField::create('Subtitle', 'A Subtitle for this Page'));
        $fields->addFieldToTab('Root.Other', TextField::create('SubDescription', 'A SubDescription for this Page'));
        $fields->addFieldToTab('Root.Attachments', $photo = UploadField::create('Photo'));
        $fields->addFieldToTab('Root.MenuItems', GridField::create(
            'MenuItems',
            'Menu Items on this Page',
            $this->MenuItems(),
            GridFieldConfig_RecordEditor::create()
        ));
        $fields->addFieldToTab('Root.Suppliers', CheckboxSetField::create(
            'Suppliers',
            'Suppliers Used',
            $this->Parent()->Suppliers()->map('ID','Name')
        ));

        $photo->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        return $fields;
    }
}
