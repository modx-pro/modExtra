<?php

/**
 * The home manager controller for modExtra.
 *
 */
class modExtraHomeManagerController extends modExtraMainController {
	/* @var modExtra $modExtra */
	public $modExtra;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('modextra');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->modExtra->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->modExtra->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modextra-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->modExtra->config['templatesPath'] . 'home.tpl';
	}
}