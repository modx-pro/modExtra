<?php
/**
 * Create an Item
 */
class modExtraItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('modExtraItem', array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name', $this->modx->lexicon('modextra_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'modExtraItemCreateProcessor';