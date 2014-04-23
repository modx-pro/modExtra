<?php
/**
 * Remove an Items
 */
class modExtraItemsRemoveProcessor extends modProcessor {
    public $checkRemovePermission = true;
	public $objectType = 'modExtraItem';
	public $classKey = 'modExtraItem';
	public $languageTopics = array('modextra');

	public function process() {

        foreach (explode(',',$this->getProperty('items')) as $id) {
            $item = $this->modx->getObject($this->classKey, $id);
            $item->remove();
        }
        
        return $this->success();

	}

}

return 'modExtraItemsRemoveProcessor';