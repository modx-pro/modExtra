<?php
/**
 * Remove an Item.
 * 
 * @package modextra
 * @subpackage processors
 */
/* get board */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('modextra.item_err_ns'));
$item = $modx->getObject('modExtraItem',$scriptProperties['id']);
if (!$item) return $modx->error->failure($modx->lexicon('modextra.item_err_nf'));

if ($item->remove() == false) {
    return $modx->error->failure($modx->lexicon('modextra.item_err_remove'));
}

/* output */
return $modx->error->success('',$item);