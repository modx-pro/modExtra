<?php
/**
 * Get an Item
 */
class modExtraItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra:default');
}

return 'modExtraItemGetProcessor';