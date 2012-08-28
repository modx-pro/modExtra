<?php
/**
 * Loads the header for mgr pages.
 *
 * @package modextra
 * @subpackage controllers
 */
$modx->regClientCSS($modExtra->config['cssUrl'].'mgr.css');
$modx->regClientStartupScript($modExtra->config['jsUrl'].'mgr/modextra.js');
$modx->regClientStartupHTMLBlock('<script type="text/javascript">
Ext.onReady(function() {
    modExtra.config = '.$modx->toJSON($modExtra->config).';
    modExtra.config.connector_url = "'.$modExtra->config['connectorUrl'].'";
    modExtra.action = "'.(!empty($_REQUEST['a']) ? $_REQUEST['a'] : 0).'";
});
</script>');

return '';