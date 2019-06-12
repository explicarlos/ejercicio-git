<?php

switch($arrayRequest['action'])
{
	case '404':
		header("HTTP/1.0 404 Not Found");
		$content = renderView("error/404", array(),$config);
		break;
	case '403':
		header("HTTP/1.0 403 Not Allowed");
		$content = renderView("error/403", array(),$config);
		break;
	default:
		break;
}

$params = array('userName'=>(isset($_SESSION['name'])?$_SESSION['name']:'Guest'),
				'content'=>$content);
echo renderLayout("layout_admin1", $params, $config);
?>