<?php
	/*
* Copyright (c) 2016 www.magebuzz.com
*/
	$installer = $this;
	$installer->startSetup();
	$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('manufacturer')};
CREATE TABLE {$this->getTable('manufacturer')} (
  `manufacturer_id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `image` varchar(255) NULL default '',
  `identifier` varchar(255) NOT NULL default '',
	`website` varchar(255) NULL,
	`description` text NULL,
	`is_featured` smallint(6) NOT NULL default '0',
  `status` smallint(6) NOT NULL default '0',
  `option_id` int(11) NOT NULL default '0',
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
	$installer->endSetup();