<?php

class Page extends SiteTree
{
    private static $db = array();

    private static $has_one = array(
        'BannerImage' => 'Image',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Attachments', $bannerImage = UploadField::create('BannerImage'));

        $bannerImage->getValidator()->setAllowedExtensions(array('png', 'gif', 'jpg', 'jpeg'));
        return $fields;

    }
}