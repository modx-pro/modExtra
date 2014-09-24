<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modExtra $modExtra */
$modExtra = $modx->getService('modextra', 'modExtra', $modx->getOption('modextra_core_path', null, $modx->getOption('core_path') . 'components/modextra/') . 'model/modextra/');
$modx->lexicon->load('modextra:default');

// handle request
$corePath = $modx->getOption('modextra_core_path', null, $modx->getOption('core_path') . 'components/modextra/');
$path = $modx->getOption('processorsPath', $modExtra->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));