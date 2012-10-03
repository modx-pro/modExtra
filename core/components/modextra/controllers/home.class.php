<?php
/**
 * The home manager controller for modExtra.
 *
 * @package modextra
 */
class modExtraHomeManagerController extends modExtraMainController {
	public function process(array $scriptProperties = array()) {}
	
	public function getPageTitle() { return $this->modx->lexicon('modextra'); }
	
	public function loadCustomCssJs() {
		$this->modx->regClientStartupScript($this->modExtra->config['jsUrl'].'mgr/widgets/items.grid.js');
		$this->modx->regClientStartupScript($this->modExtra->config['jsUrl'].'mgr/widgets/home.panel.js');
		$this->modx->regClientStartupScript($this->modExtra->config['jsUrl'].'mgr/sections/home.js');
	}
	
	public function getTemplateFile() {
		return $this->modExtra->config['templatesPath'].'home.tpl';
	}
}