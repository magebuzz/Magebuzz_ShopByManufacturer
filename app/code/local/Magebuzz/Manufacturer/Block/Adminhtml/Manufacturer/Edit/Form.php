<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Block_Adminhtml_Manufacturer_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
    $form = new Varien_Data_Form(array(
        'id'      => 'edit_form',
        'action'  => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
        'method'  => 'post',
        'enctype' => 'multipart/form-data'
      )
    );

    $form->setUseContainer(TRUE);
    $this->setForm($form);
    return parent::_prepareForm();
  }
}