<?php
/**
 * Resolve creating db tables
 *
 * @package modextra
 * @subpackage build
 */
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modx =& $object->xpdo;
			$modelPath = $modx->getOption('modextra.core_path',null,$modx->getOption('core_path').'components/modextra/').'model/';
			$modx->addPackage('modextra',$modelPath);

			$manager = $modx->getManager();

			$manager->createObjectContainer('modExtraItem');

			break;
		case xPDOTransport::ACTION_UPGRADE:
			break;
	}
}
return true;