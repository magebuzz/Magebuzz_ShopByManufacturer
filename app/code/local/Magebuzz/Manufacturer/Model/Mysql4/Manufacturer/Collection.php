<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Model_Mysql4_Manufacturer_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('manufacturer/manufacturer');
	}

	public function addStoreFilter($storeId)
	{
		if ($storeId) {
			$this->getSelect()->joinInner(
				array('e' => $this->getTable('manufacturer_store')),
				"main_table.manufacturer_id = e.manufacturer_id AND e.store_id = $storeId",
				array()
			);
		}
		return $this;
	}
}