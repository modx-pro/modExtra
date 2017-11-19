<?php

class modExtraItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modExtraItem';
    public $classKey = 'modExtraItem';
    public $languageTopics = ['modextra'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modextra_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('modextra_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modExtraItemCreateProcessor';