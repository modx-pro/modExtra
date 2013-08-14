<?php

require_once dirname(__FILE__) . '/model/modextra/modextra.class.php';

/**
 * Class modExtraMainController
 */
abstract class modExtraMainController extends modExtraManagerController {
	/** @var modExtra $modExtra */
	public $modExtra;


	/**
	 * @return void
	 */
	public function initialize() {
		$this->modExtra = new modExtra($this->modx);

		$this->modx->regClientCSS($this->modExtra->config['cssUrl'] . 'mgr/main.css');
		$this->modx->regClientStartupScript($this->modExtra->config['jsUrl'] . 'mgr/modextra.js');
		$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
		Ext.onReady(function() {
			modExtra.config = ' . $this->modx->toJSON($this->modExtra->config) . ';
			modExtra.config.connector_url = "' . $this->modExtra->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('modextra:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends modExtraMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}