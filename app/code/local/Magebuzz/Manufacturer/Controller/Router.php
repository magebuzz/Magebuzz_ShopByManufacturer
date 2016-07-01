<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Controller_Router extends Mage_Core_Controller_Varien_Router_Abstract
{
  public function initControllerRouters($observer)
  {
    $front = $observer->getEvent()->getFront();
    $manufacturer = new Magebuzz_Manufacturer_Controller_Router();
    $front->addRouter('manufacturer', $manufacturer);
  }

  public function match(Zend_Controller_Request_Http $request)
  {
    if (!Mage::app()->isInstalled()) {
      Mage::app()->getFrontController()->getResponse()
        ->setRedirect(Mage::getUrl('install'))
        ->sendResponse();
      exit;
    }
    $route = Mage::helper('manufacturer')->getConfigTextRouter();
    $identifier = $request->getPathInfo();

    if (substr(str_replace("/", "", $identifier), 0, strlen($route)) != $route) {
      return FALSE;
    }
    $identifier = substr_replace($request->getPathInfo(), '', 0, strlen("/" . $route . "/"));
    if (substr($request->getPathInfo(), 0, 13) !== '/manufacturer') {
      if ($identifier == '') {
        $request->setModuleName('manufacturer')
          ->setControllerName('index')
          ->setActionName('index');
        return TRUE;
      } elseif (substr($request->getPathInfo(), 0, strlen($route) + 2) === '/' . $route . '/') {
        $request->setModuleName('manufacturer')
          ->setControllerName('index')
          ->setActionName('view');
        return TRUE;
      }
    }
    return FALSE;
  }
}

?>
