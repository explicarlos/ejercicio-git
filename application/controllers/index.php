<?php

switch($arrayRequest['action'])
{
	case 'index':
		$content = renderView('index/index', array(), $config);
		break;
	default:
		break;
}

$params = array('content'=>$content);
echo renderLayout("layout_front", $params, $config);
?>