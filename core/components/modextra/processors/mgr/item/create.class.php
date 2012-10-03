<?php
/**
 * Create an Item
 * 
 * @package modextra
 * @subpackage processors
 */
class modExtraItemCreateProcessor extends modObjectCreateProcessor {
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');
	public $permission = 'new_document';
	
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('modExtraItem',array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name',$this->modx->lexicon('modextra.item_err_ae'));
		}
		return !$this->hasErrors();
	}
	
}

return 'modExtraItemCreateProcessor';