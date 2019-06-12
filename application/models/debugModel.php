<?php
/**
 * Blah blah
 * @param array $data Data to be shown
 */
function _debug($data, $label=null)
{
	echo "<pre>";
	if(isset($label))
		echo $label.": "."\n";
	print_r($data);
	echo "</pre>";
}