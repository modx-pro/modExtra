<?php
class modExtra
{
    /** @var modX $modx */
    public $modx;
    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/modextra/';
        $assetsUrl = MODX_ASSETS_URL . 'components/modextra/';
        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);
        $this->modx->addPackage('modextra', $this->config['modelPath']);
        $this->modx->lexicon->load('modextra:default');
    }
}
