<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_View extends Mage_Core_Block_Template
{
  public function _prepareLayout()
  {
    $id = $this->getRequest()->getParam('id');
    $manufacturer = Mage::getModel('manufacturer/manufacturer')->load($id);
    $head = $this->getLayout()->getBlock('head');
    $head->setKeywords($manufacturer->getMetaKeywords());
    $head->setDescription($manufacturer->getMetaDescription());
    return parent::_prepareLayout();
  }

  public function getManufacturer()
  {
    $id = $this->getRequest()->getParam('id');
    $manufacturer = Mage::getModel('manufacturer/manufacturer')->load($id);
    return $manufacturer;
  }

  public function getManufacturerImage($image)
  {
    return Mage::helper('manufacturer')->getManufacturerImage($image);
  }

  public function getProductHtml()
  {
    return $this->getChildHtml('manufacturer.product');
  }

  public function setListCollection()
  {
    $this->getChild('manufacturer.product')
      ->setCollection($this->_getProductCollection());
  }

  protected function _getProductCollection()
  {
    $manufacturer = $this->getManufacturer();
    $collection = Mage::getModel('catalog/product')->getCollection()
      ->addAttributeToSelect('*')
      ->addAttributeToFilter(Mage::helper('manufacturer')->getConfigAttributrCode(), array('in' => array($manufacturer->getOptionId())))
      ->addFieldToFilter('status', 1);
    $collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());
    return $collection;
  }

  public function getDefaultManufacturerImage()
  {
    return Mage::helper('manufacturer')->getDefaultManufacturerImage();
  }
}