<?php
/**
 * Get an Item
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra:default');
}

return 'modExtraItemGetProcessor';