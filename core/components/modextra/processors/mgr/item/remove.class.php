<?php
/**
 * Remove an Item
 */
class modExtraItemRemoveProcessor extends modObjectRemoveProcessor {
	public $checkRemovePermission = true;
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');

}

return 'modExtraItemRemoveProcessor';