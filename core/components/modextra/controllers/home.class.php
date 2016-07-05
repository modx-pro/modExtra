<?php

/**
 * The home manager controller for modExtra.
 *
 */
class modExtraHomeManagerController extends modExtraManagerController
{
    /** @var modExtra $modExtra */
    public $modExtra;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('modextra_core_path', null,
                $this->modx->getOption('core_path') . 'components/modextra/') . 'model/modextra/';
        $this->modExtra = $this->modx->getService('modextra', 'modExtra', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('modextra:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modextra');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modExtra->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->modExtra->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/modextra.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modExtra->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modExtra.config = ' . json_encode($this->modExtra->config) . ';
        modExtra.config.connector_url = "' . $this->modExtra->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "modextra-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modExtra->config['templatesPath'] . 'home.tpl';
    }
}