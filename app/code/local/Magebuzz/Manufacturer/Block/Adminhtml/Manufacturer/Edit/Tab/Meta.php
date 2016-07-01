<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_Adminhtml_Manufacturer_Edit_Tab_Meta extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
    $form = new Varien_Data_Form();
    $model = Mage::registry('manufacturer_data');
    $fieldset = $form->addFieldset('meta_fieldset', array('legend' => Mage::helper('manufacturer')->__('Meta Data'), 'class' => 'fieldset-wide'));
    $fieldset->addField('meta_keywords', 'textarea', array(
      'name'  => 'meta_keywords',
      'label' => Mage::helper('manufacturer')->__('Keywords'),
      'title' => Mage::helper('manufacturer')->__('Meta Keywords')
    ));
    $fieldset->addField('meta_description', 'textarea', array(
      'name'  => 'meta_description',
      'label' => Mage::helper('manufacturer')->__('Description'),
      'title' => Mage::helper('manufacturer')->__('Meta Description')
    ));
    $form->setValues($model->getData());
    $this->setForm($form);
    return parent::_prepareForm();
  }
}