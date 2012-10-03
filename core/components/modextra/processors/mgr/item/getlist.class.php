<?php
/**
 * Get a list of Items
 *
 * @package modextra
 * @subpackage processors
 */
class modExtraItemGetListProcessor extends modObjectGetListProcessor {
	public $classKey = 'modExtraItem';
	public $defaultSortField = 'id';
	public $defaultSortDirection  = 'DESC';
	public $renderers = '';
	
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		return $c;
	}

	public function prepareRow(xPDOObject $object) {
		$array = $object->toArray();
		return $array;
	}
	
}

return 'modExtraItemGetListProcessor';