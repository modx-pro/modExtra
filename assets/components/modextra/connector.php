<?php
/**
 * modExtra Connector
 *
 * @package modextra
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('modextra_core_path',null,$modx->getOption('core_path').'components/modextra/');
require_once $corePath.'model/modextra/modextra.class.php';
$modx->modextra = new modExtra($modx);

$modx->lexicon->load('modextra:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->modextra->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));