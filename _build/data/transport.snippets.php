<?php
/**
 * Add snippets to build
 * 
 * @package modextra
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'modExtra',
    'description' => 'Displays Items.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modextra.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.modextra.php';
$snippets[0]->setProperties($properties);
unset($properties);

return $snippets;