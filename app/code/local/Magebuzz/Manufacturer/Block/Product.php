<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_Product extends Mage_Catalog_Block_Product_List
{
  protected function _getProductCollection()
  {
    $manufacturer_id = $this->getRequest()->getParam('id');
    $collection = Mage::getModel('catalog/product')->getCollection()
      ->addAttributeToSelect('*');
    $collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());
    $this->_productCollection = $collection;
    return $this->_productCollection;
  }
}