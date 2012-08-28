<?php
/**
 * Create an Item
 * 
 * @package modextra
 * @subpackage processors
 */
$alreadyExists = $modx->getObject('modExtraItem',array(
    'name' => $_POST['name'],
));
if ($alreadyExists) {
    $modx->error->addField('name',$modx->lexicon('modextra.item_err_ae'));
}

if ($modx->error->hasError()) {
    return $modx->error->failure();
}

$item = $modx->newObject('modExtraItem');
$item->fromArray($_POST);

if ($item->save() == false) {
    return $modx->error->failure($modx->lexicon('modextra.item_err_save'));
}

return $modx->error->success('',$item);