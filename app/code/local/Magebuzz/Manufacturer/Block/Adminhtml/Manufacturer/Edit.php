<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_Adminhtml_Manufacturer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
  public function __construct()
  {
    parent::__construct();

    $this->_objectId = 'id';
    $this->_blockGroup = 'manufacturer';
    $this->_controller = 'adminhtml_manufacturer';
    $this->_updateButton('save', 'label', Mage::helper('manufacturer')->__('Save Manufacturer'));
    $this->_updateButton('delete', 'label', Mage::helper('manufacturer')->__('Delete Manufacturer'));
    $this->_addButton('saveandcontinue', array(
      'label'   => Mage::helper('adminhtml')->__('Save And Continue Edit'),
      'onclick' => 'saveAndContinueEdit()',
      'class'   => 'save',
    ), -100);
    $this->_formScripts[] = "
    function saveAndContinueEdit(){
    editForm.submit($('edit_form').action+'back/edit/');
    }
    ";
  }

  public function getSaveUrl()
  {
    return $this->getUrl('*/*/save', array('store' => $this->getRequest()->getParam('store')));
  }

  public function getHeaderText()
  {
    if (Mage::registry('manufacturer_data') && Mage::registry('manufacturer_data')->getId()) {
      return Mage::helper('manufacturer')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('manufacturer_data')->getName()));
    } else {
      return Mage::helper('manufacturer')->__('Add Item');
    }
  }
}