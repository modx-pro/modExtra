<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/modExtra/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/modextra')) {
            $cache->deleteTree(
                $dev . 'assets/components/modextra/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/modextra/', $dev . 'assets/components/modextra');
        }
        if (!is_link($dev . 'core/components/modextra')) {
            $cache->deleteTree(
                $dev . 'core/components/modextra/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/modextra/', $dev . 'core/components/modextra');
        }
    }
}

return true;