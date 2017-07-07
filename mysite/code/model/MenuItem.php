<?php

class MenuItem extends DataObject
{
    private static $db = array(
        'Name' => 'Varchar(50)',
        'Price' => 'Text',
        'Description' => 'Text',
    );

    private static $has_one = array(
        'Photo' => 'Image',
        'RestaurantArticle' => 'RestaurantArticle'
    );

    private static $summary_fields = array (
        'Name' => 'Name of Menu Item',
        'Price' => 'Retail Price (incl. GST)',
        'Description' => 'Description',
        'GridThumbnail' => 'Image'
    );

    public function getGridThumbnail() {
        if($this->Photo()->exists()) {
            return $this->Photo()->SetWidth(100);
        }

        return '(no image)';
    }

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