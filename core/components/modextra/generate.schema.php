<?php
/**
 * The script for generation schema and model from database tables.
 *
 * @package modextra
 */
 
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/index.php';
/*******************************************************/

$package = 'modextra'; // Class name for generation
$suffix = 'modextra_'; // Suffix of tables.
$prefix = $modx->config['table_prefix']; // table prefix

// Folders for schema and model
$Model = dirname(__FILE__).'/model/';
$Schema = dirname(__FILE__).'/model/schema/';
$xml = $Schema.$package.'.mysql.schema.xml';

// Remove old files
rrmdir($Model.$package .'/mysql');
unlink($xml);

/*******************************************************/

$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
$modx->error->message = null;
$modx->loadClass('transport.modPackageBuilder', '', false, true);
$manager = $modx->getManager();
$generator = $manager->getGenerator();

$generator->writeSchema($xml, $package, 'xPDOObject', $prefix.$suffix, true);

$tmp = str_replace('table="', 'table="'.$suffix, file_get_contents($xml));
file_put_contents($xml, $tmp);

$generator->parseSchema($xml, $Model);

print "\nDone\n";


/********************************************************/
/**
 * Recursive directory remove
 *
 * @package modextra
 */
function rrmdir($dir) { 
	if (is_dir($dir)) { 
		$objects = scandir($dir); 
		
		foreach ($objects as $object) { 
			if ($object != "." && $object != "..") { 
				if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
			} 
		}
		
		reset($objects); 
		rmdir($dir); 
	} 
} 