<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            // Assign policy to template
            if ($policy = $modx->getObject('modAccessPolicy', array('name' => 'modExtraUserPolicy'))) {
                if ($template = $modx->getObject('modAccessPolicyTemplate',
                    array('name' => 'modExtraUserPolicyTemplate'))
                ) {
                    $policy->set('template', $template->get('id'));
                    $policy->save();
                } else {
                    $modx->log(xPDO::LOG_LEVEL_ERROR,
                        '[modExtra] Could not find modExtraUserPolicyTemplate Access Policy Template!');
                }
            } else {
                $modx->log(xPDO::LOG_LEVEL_ERROR, '[modExtra] Could not find modExtraUserPolicyTemplate Access Policy!');
            }
            break;
    }
}
return true;