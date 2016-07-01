<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_IndexController extends Mage_Core_Controller_Front_Action
{
  public function preDispatch()
  {
    parent::preDispatch();
  }

  public function indexAction()
  {
    $this->loadLayout();
    $this->getLayout()->getBlock('head')->setTitle(Mage::helper('manufacturer')->__('Shop By ' . Mage::helper('manufacturer')->getConfigTextLabe()));
    $this->renderLayout();
  }

  public function viewAction()
  {
    $id = $this->getRequest()->getParam('id', FALSE);
    if ($id) {
      $manufacturer = Mage::getModel('manufacturer/manufacturer')->load($id);
      $this->loadLayout();
      $this->getLayout()->getBlock('head')->setTitle($manufacturer->getName());
      $this->renderLayout();
      return;
    } else {
      return $this->_redirect('*/*/index');
    }
  }
}