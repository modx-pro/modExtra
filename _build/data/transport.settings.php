<?php
/**
 * Loads system settings into build
 *
 * @package modextra
 * @subpackage build
 */
$settings = array();

$tmp = array(
	'some_setting' => array(
		'xtype' => 'combo-boolean'
		,'value' => true
		,'area' => 'modextra_main'
	)
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'modextra_'.$k
			,'namespace' => 'modextra'
		), $v
	),'',true,true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;