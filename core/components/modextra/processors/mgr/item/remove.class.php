<?php
/**
 * Remove an Item.
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemRemoveProcessor extends modObjectRemoveProcessor  {
	public $checkRemovePermission = true;
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');

}
return 'modExtraItemRemoveProcessor';