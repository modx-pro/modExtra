<?php

/**
 * @param $filename
 *
 * @return string
 */
function getSnippetContent($filename) {
	$o = file_get_contents($filename);
	$o = trim(str_replace(array('<?php','?>'),'',$o));
	return $o;
}
