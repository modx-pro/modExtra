<?php

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
		$corePath = $this->modx->getOption('modextra_core_path', null, $this->modx->getOption('core_path') . 'components/modextra/');
		require_once $corePath . 'model/modextra/modextra.class.php';

		$this->modExtra = new modExtra($this->modx);
		//$this->addCss($this->modExtra->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/modextra.js');
		$this->addHtml('
		<script type="text/javascript">
			modExtra.config = ' . $this->modx->toJSON($this->modExtra->config) . ';
			modExtra.config.connector_url = "' . $this->modExtra->config['connectorUrl'] . '";
		</script>
		');

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