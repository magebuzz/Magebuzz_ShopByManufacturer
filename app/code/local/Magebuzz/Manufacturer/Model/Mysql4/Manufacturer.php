<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Model_Mysql4_Manufacturer extends Mage_Core_Model_Mysql4_Abstract
{
  public function _construct()
  {
    $this->_init('manufacturer/manufacturer', 'manufacturer_id');
  }

  public function saveStore($manufacturer_id, $storeIds)
  {
    $where = $this->_getReadAdapter()->quoteInto('manufacturer_id = ?', $manufacturer_id);
    $select = $this->_getReadAdapter()->select()->from(
      $this->getTable('manufacturer/manufacturer_store')
    )->where($where);
    $rows = $this->_getReadAdapter()->fetchAll($select);
    if ($rows) {
      $this->_getWriteAdapter()->delete($this->getTable('manufacturer/manufacturer_store'), $where);
    }
    if (is_array($storeIds)) {
      foreach ($storeIds as $store_id) {
        $manufacturerstoreArray = array();
        $manufacturerstoreArray['manufacturer_id'] = $manufacturer_id;
        $manufacturerstoreArray['store_id'] = $store_id;
        $this->_getWriteAdapter()->insert(
          $this->getTable('manufacturer/manufacturer_store'), $manufacturerstoreArray);
      }
    } else {
      $manufacturerstoreArray = array();
      $manufacturerstoreArray['manufacturer_id'] = $manufacturer_id;
      $manufacturerstoreArray['store_id'] = $storeIds;
      $this->_getWriteAdapter()->insert(
        $this->getTable('manufacturer/manufacturer_store'), $manufacturerstoreArray);
    }
    return $this;
  }

  public function getManufacturerId($store_id)
  {
    $where = $this->_getReadAdapter()->quoteInto('store_id IN (?)', array('0', $store_id));
    $select = $this->_getReadAdapter()->select()->from(
      $this->getTable('manufacturer/manufacturer_store')
    )->where($where);
    $rows = $this->_getReadAdapter()->fetchAll($select);
    $manufacturerIds = array();
    foreach ($rows as $row) {
      $manufacturerIds[] = $row['manufacturer_id'];
    }
    return $manufacturerIds;
  }

  public function getStoreId($manufacturer_id)
  {
    $where = $this->_getReadAdapter()->quoteInto('manufacturer_id = ?', $manufacturer_id);
    $select = $this->_getReadAdapter()->select()->from(
      $this->getTable('manufacturer/manufacturer_store')
    )->where($where);
    $rows = $this->_getReadAdapter()->fetchAll($select);
    $storeIds = array();
    foreach ($rows as $row) {
      $storeIds[] = $row['store_id'];
    }
    return $storeIds;
  }


//  public function getManufacturer ($store_id) {
//  $manufacturer_table=$this->getTable('manufacturer/manufacturer');
//  $manufacturer_store_table=$this->getTable('manufacturer/manufacturer_store');
//  $where = $this->_getReadAdapter()->quoteInto('store_id = ? AND ', $store_id).$this->_getReadAdapter()->quoteInto('status =?',1);
//  $condition=$this->_getReadAdapter()->quoteInto('manufacturer.manufacturer_id =manufacturer_store.manufacturer_id', '');
//  $select=$this->_getReadAdapter()->select()->from(array('manufacturer'=>$manufacturer_table))->join(array('manufacturer_store'=>$manufacturer_store_table),$condition)->where($where);
//  $manufacturer=$this->_getReadAdapter()->fetchAll($select);
//  return $manufacturer;
//  }
}