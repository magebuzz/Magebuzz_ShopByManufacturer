<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Model_Validatemanufacturer extends Mage_Core_Model_Config_Data
{
  public function save()
  {
    $manufacturerCode = $this->getValue();
    $attribute = Mage::getModel('eav/entity_attribute')
      ->loadByCode('catalog_product', $manufacturerCode)->getFrontendInput();
    if ($attribute == '' || $attribute == null) {
      Mage::throwException("Attribute doesn't Exist.");
    }
    if ($attribute != 'select') {
      Mage::getSingleton('core/session')->addNotice('Attribute Manufacturer Code support type is Dropdown .');
      Mage::throwException("Attribute type doesn't Dropdown.");
    }
    return parent::save();
  }
}
