<?php
/**
 * Get a list of Items
 *
 * @package modextra
 * @subpackage processors
 */
$isLimit = !empty($_REQUEST['limit']);
$start = $modx->getOption('start',$_REQUEST,0);
$limit = $modx->getOption('limit',$_REQUEST,20);
$sort = $modx->getOption('sort',$_REQUEST,'name');
$dir = $modx->getOption('dir',$_REQUEST,'ASC');

$c = $modx->newQuery('modExtraItem');
$count = $modx->getCount('modExtraItem',$c);

$c->sortby($sort,$dir);
if ($isLimit) $c->limit($limit,$start);
$items = $modx->getCollection('modExtraItem',$c);

$list = array();
foreach ($items as $item) {
    $itemArray = $item->toArray();
    $list[]= $itemArray;
}
return $this->outputArray($list,$count);