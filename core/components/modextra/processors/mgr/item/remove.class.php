<?php
/**
 * Remove an Item.
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemRemoveProcessor extends modObjectRemoveProcessor  {
	public $checkRemovePermission = true;
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');

}
return 'modExtraItemRemoveProcessor';