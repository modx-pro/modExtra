<?php
/**
 * Resolve creating db tables
 */
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			/* @var modX $modx */
			$modx =& $object->xpdo;
			$modelPath = $modx->getOption('modextra_core_path',null,$modx->getOption('core_path').'components/modextra/').'model/';
			$modx->addPackage('modextra', $modelPath);

			$manager = $modx->getManager();
			$manager->createObjectContainer('modExtraItem');
		break;

		case xPDOTransport::ACTION_UPGRADE:
		break;
	}
}
return true;