<?php
/*
* Copyright (c) 2016 www.magebuzz.com
*/
$installer = $this;
$installer->startSetup();
$installer->run("
	ALTER TABLE {$this->getTable('manufacturer')} ADD `meta_keywords` text NOT NULL;
	ALTER TABLE {$this->getTable('manufacturer')} ADD `meta_description` text NOT NULL;
    ");
$installer->endSetup(); 