<?php
/**
 * @package modextra
 * @subpackage controllers
 */
require_once dirname(dirname(__FILE__)).'/model/modextra/modextra.class.php';
$modextra = new modExtra($modx);
return $modextra->initialize('mgr');