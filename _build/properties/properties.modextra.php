<?php
/**
 * Properties for the modExtra snippet.
 *
 * @package modextra
 * @subpackage build
 */
$properties = array(
	array(
		'name' => 'tpl',
		'desc' => 'prop_modextra.tpl_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => 'tpl.modExtra.item',
		'lexicon' => 'modextra:properties',
	),
	array(
		'name' => 'sortBy',
		'desc' => 'prop_modextra.sortby_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => 'name',
		'lexicon' => 'modextra:properties',
	),
	array(
		'name' => 'sortDir',
		'desc' => 'prop_modextra.sortdir_desc',
		'type' => 'list',
		'options' => array(
			array('text' => 'ASC','value' => 'ASC'),
			array('text' => 'DESC','value' => 'DESC'),
		),
		'value' => 'ASC',
		'lexicon' => 'modextra:properties',
	),
	array(
		'name' => 'limit',
		'desc' => 'prop_modextra.limit_desc',
		'type' => 'numberfield',
		'options' => '',
		'value' => 5,
		'lexicon' => 'modextra:properties',
	),
	array(
		'name' => 'outputSeparator',
		'desc' => 'prop_modextra.outputseparator_desc',
		'type' => 'textfield',
		'options' => '',
		'value' => '',
		'lexicon' => 'modextra:properties',
	),
	array(
		'name' => 'toPlaceholder',
		'desc' => 'prop_modextra.toplaceholder_desc',
		'type' => 'combo-boolean',
		'options' => '',
		'value' => false,
		'lexicon' => 'modextra:properties',
	),
/*
	array(
		'name' => '',
		'desc' => 'prop_modextra.',
		'type' => 'textfield',
		'options' => '',
		'value' => '',
		'lexicon' => 'modextra:properties',
	),
	*/
);

return $properties;