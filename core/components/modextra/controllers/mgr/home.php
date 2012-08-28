<?php
/**
 * Loads the home page.
 *
 * @package modextra
 * @subpackage controllers
 */
$modx->regClientStartupScript($modExtra->config['jsUrl'].'mgr/widgets/items.grid.js');
$modx->regClientStartupScript($modExtra->config['jsUrl'].'mgr/widgets/home.panel.js');
$modx->regClientStartupScript($modExtra->config['jsUrl'].'mgr/sections/home.js');
$output = '<div id="modextra-panel-home-div"></div>';

return $output;
