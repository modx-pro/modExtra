<?php

if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
			$modelPath = $modx->getOption('modextra_core_path', null, $modx->getOption('core_path') . 'components/modextra/') . 'model/';
			$modx->addPackage('modextra', $modelPath);

			$manager = $modx->getManager();
			$objects = array();
            $schemaFile = MODX_CORE_PATH . 'components/modextra/model/schema/modextra.mysql.schema.xml';
            if (is_file($schemaFile)) {
                $schema = new SimpleXMLElement($schemaFile, 0, true);
                if (isset($schema->object)) {
                    foreach ($schema->object as $object) {
                        $objects[] = (string)$object['class'];
                    }
                }
                unset($schema);
            } else {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Could not get classes from schema file.');
            }
			foreach ($objects as $tmp) {
                // Operate with tables
                $manager->createObjectContainer($tmp);

                $tableFields = array();
                $c = $modx->prepare("SHOW COLUMNS IN {$modx->getTableName($tmp)}");
                $c->execute();
                while ($cl = $c->fetch(PDO::FETCH_ASSOC)) {
                    $tableFields[] = $cl['Field'];
                }

                foreach ($manager->xpdo->getFields($tmp) as $field=>$v) {
                    if (in_array($field,$tableFields)) {
                        unset($tableFields[$field]);
                        $manager->alterField($tmp, $field);
                    } else {
                        $manager->addField($tmp, $field);
                    }
                }
                foreach ($tableFields as $field) {
                    $manager->removeField($tmp, $field);
                }
                // Operate with indexes
                if ($options[xPDOTransport::PACKAGE_ACTION] == xPDOTransport::ACTION_INSTALL) {
                    foreach ($modx->getIndexMeta($tmp) as $name=>$meta) {
                        $manager->addIndex($tmp,$name);
                    }
                } else {
                    $indexes = array();
                    $c = $modx->prepare("SHOW INDEX FROM {$modx->getTableName($tmp)}");
                    $c->execute();
                    while ($cl = $c->fetch(PDO::FETCH_ASSOC)) {
                        $indexes[] = $cl['Key_name'];
                    }
                    foreach ($modx->getIndexMeta($tmp) as $name=>$meta) {
                        if (in_array($name,$indexes)) {
                            unset($indexes[$name]);
                        } else {
                            $manager->addIndex($tmp,$name);
                        }
                    }
                    foreach ($indexes as $index) {
                        $manager->removeIndex($tmp, $index);
                    }
                }
			}
			break;

		case xPDOTransport::ACTION_UNINSTALL:
            // Remove tables if it's need
            /*
            $modelPath = $modx->getOption('modextra_core_path', null, $modx->getOption('core_path') . 'components/modextra/') . 'model/';
            $modx->addPackage('modextra', $modelPath);

            $manager = $modx->getManager();
            $objects = array();
            $schemaFile = MODX_CORE_PATH . 'components/modextra/model/schema/modextra.mysql.schema.xml';
            if (is_file($schemaFile)) {
                $schema = new SimpleXMLElement($schemaFile, 0, true);
                if (isset($schema->object)) {
                    foreach ($schema->object as $object) {
                        $objects[] = (string)$object['class'];
                    }
                }
                unset($schema);
            } else {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Could not get classes from schema file.');
            }
            foreach ($objects as $tmp) {
                $manager->removeObjectContainer($tmp);
            }
            */
			break;
	}
}
return true;
