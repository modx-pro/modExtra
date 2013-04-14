<?php
/**
 * Add snippets to build
 * 
 * @package modextra
 * @subpackage build
 */

$snippets = array();

$tmp = array(
	'modExtra' => array(
		'file' => 'modextra'
		,'description' => 'Displays Items.'
	)
);

foreach ($tmp as $k => $v) {
	/* @avr modSnippet $snippet */
	$snippet = $modx->newObject('modSnippet');
	$snippet->fromArray(array(
		'id' => 0
		,'name' => $k
		,'description' => @$v['description']
		,'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.'.$v['file'].'.php')
		//,'static' => 1
		//,'static_file' => 'core/components/modextra/elements/snippets/'.$v['file'].'.php'
	),'',true,true);

	$properties = include $sources['build'].'properties/properties.'.$v['file'].'.php';
	$snippet->setProperties($properties);

	$snippets[] = $snippet;
}

unset($tmp, $properties);
return $snippets;