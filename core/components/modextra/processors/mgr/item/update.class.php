<?php
/**
 * Update an Item
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemUpdateProcessor extends modObjectUpdateProcessor {
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');
	public $permission = 'update_document';
}

return 'modExtraItemUpdateProcessor';