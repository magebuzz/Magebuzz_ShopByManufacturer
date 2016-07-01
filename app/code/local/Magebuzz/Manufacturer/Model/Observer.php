<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/

class Magebuzz_Manufacturer_Model_Observer {
	public function page_block_html_topmenu_gethtml_before(Varien_Event_Observer $observer)
	{
		$event = $observer->getEvent();

		$menu = $event->getMenu();
		$menuCollection = $menu->getChildren();

		if ($block = Mage::app()->getLayout()->getBlock('catalog.topnav')) {
			if ($links = $block->getAdditionalLinks()) {
				foreach ($links as $link) {
					$data = array(
						'id'            => 'category-additionalnode-' . crc32($link['url']),
						'name'          => $link['label'],
						'url'           => $link['url'],
						'is_active'     => $link['is_active'],
					);

					$node = new Varien_Data_Tree_Node($data, 'id', $menu->getTree());
					$menuCollection->add($node);
				}
			}
		}
	}
}