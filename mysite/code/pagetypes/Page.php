<?php

class Page extends SiteTree
{
    private static $db = array();

    private static $has_one = array(
        'BannerImage' => 'Image',
    );

    private static $has_many = array(
        'Suppliers' => 'Supplier'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Suppliers', GridField::create(
            'Suppliers',
            'Restaurant Suppliers',
            $this->Suppliers(),
            GridFieldConfig_RecordEditor::create()
        ));
        $fields->addFieldToTab('Root.Attachments', $bannerImage = UploadField::create('BannerImage'));

        $bannerImage->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        return $fields;

    }
}