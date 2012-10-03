<?php
/**
 * The main manager controller for modExtra.
 *
 * @package modextra
 */

require_once dirname(__FILE__) . '/model/modextra/modextra.class.php';

abstract class modExtraMainController extends modExtraManagerController {
	/** @var modExtra $modextra */
	public $modextra;

	public function initialize() {
		$this->modExtra = new modExtra($this->modx);
		
		$this->modx->regClientCSS($this->modExtra->config['cssUrl'].'mgr.css');
		$this->modx->regClientStartupScript($this->modExtra->config['jsUrl'].'mgr/modextra.js');
		$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
		Ext.onReady(function() {
			modExtra.config = '.$this->modx->toJSON($this->modExtra->config).';
			modExtra.config.connector_url = "'.$this->modExtra->config['connectorUrl'].'";
		});
		</script>');
		
		return parent::initialize();
	}

	public function getLanguageTopics() {
		return array('modextra:default');
	}

	public function checkPermissions() { return true;}
}

class IndexManagerController extends modExtraMainController {
	public static function getDefaultController() { return 'home'; }
}