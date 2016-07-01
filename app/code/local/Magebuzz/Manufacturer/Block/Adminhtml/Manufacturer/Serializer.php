<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/
class Magebuzz_Manufacturer_Block_Adminhtml_Manufacturer_Serializer extends Mage_Core_Block_Template
{
  public function __construct()
  {
    parent::__construct();
    return $this;
  }

  public function initSerializerBlock($gridName, $hiddenInputName)
  {
    $grid = $this->getLayout()->getBlock($gridName);
    $this->setGridBlock($grid)
      ->setInputElementName($hiddenInputName);
  }
}