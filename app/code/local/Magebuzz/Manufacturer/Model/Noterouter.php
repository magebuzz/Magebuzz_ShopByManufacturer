<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Model_Noterouter extends Mage_Core_Model_Config_Data
{

  public function _afterSave()
  {
    $router = $this->getValue();
    if ($this->isValueChanged()) {
      $helper = Mage::helper('manufacturer');
      $urls = Mage::getModel('core/url_rewrite')->getCollection()
        ->addFieldToFilter('id_path', array('like' => 'manufacturer%'));
      if (count($urls)) {
        foreach ($urls as $item) {
          try {
            $item->delete();
          } catch (Exception $e) {
          }
        }
      }
      $collection = Mage::getModel('manufacturer/manufacturer')->getCollection();
      if (count($collection)) {
        $store_id = Mage::app()->getStore()->getId();
        try {
          foreach ($collection as $item) {
            if ($item->getIdentifier()) {
              $rewriteModel = Mage::getModel('core/url_rewrite');
              $identifier = $helper->generateIdentifier($item->getName());
              $id_path = 'manufacturer/' . $item->getId();
              $request_path = $router . '/' . $identifier;
              $rewriteModel->loadByRequestPath($request_path);
              if ($rewriteModel->getId()) {
                $identifier = $identifier . '-' . $item->getId();
                $request_path = $request_path . '-' . $item->getId();
              }
              $urlRewrite = Mage::getModel('core/url_rewrite');
              $urlRewrite->setData('id_path', 'manufacturer/' . $item->getId());
              $urlRewrite->setData('target_path', 'manufacturer/index/view/id/' . $item->getId());
              $urlRewrite->setStoreId($store_id);
              $urlRewrite->setData('request_path', $request_path);
              $urlRewrite->save();
              $item->setIdentifier($identifier)->save();
            }
          }
        } catch (Exception $e) {
        }
      }
    }
    return parent::_afterSave();
  }
}
