<?php
/**
 * Get an Item
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemGetProcessor extends modObjectGetProcessor {
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra:default');
	public $objectType = 'modextra';
}

return 'modExtraItemGetProcessor';