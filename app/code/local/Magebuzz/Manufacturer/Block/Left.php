<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_Left extends Magebuzz_Manufacturer_Block_Manufacturer
{
  public function _prepareLayout()
  {
    return parent::_prepareLayout();
  }

  public function displayOnSidebarBlock()
  {
    $block = $this->getParentBlock();
    if ($block) {
      if (Mage::getStoreConfig('manufacturer/general/enable_left_nav')) {
        $sidebarBlock = $this->getLayout()->createBlock('manufacturer/sidebar');
        $block->insert($sidebarBlock, '', FALSE, 'manufacturer-sidebar');
      }
    }
  }
}