<?php
/** @var modX $modx */
/** @var array $sources */

$widgets = array();

$tmp = array(
    'modextra_widget_name' => array(
        'description' => '',
        'type' => 'file',
        'content' => '',
        'size' => 'half'
    ),
);

foreach ($tmp as $k => $v) {
    /** @var modDashboardWidget $widget */
    $widget = $modx->newObject('modDashboardWidget',array(
        'name' => $k,
        'description' => $v['description'],
        'type' => $v['type'],
        'content' => $v['content'],
        'namespace' => 'core',
        'lexicon' => 'core:dashboards',
        'size' => $v['size']
	));

    $widgets[] = $widget;
}
unset($widget, $i);

return $widgets;
