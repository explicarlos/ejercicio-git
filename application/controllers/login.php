<?php
require_once(APPLICATION_PATH."/models/loginModel.php");

switch($arrayRequest['action'])
{
	case 'index':
	case 'login':
		if($_POST)
		{
			loginUser($cnx, $_POST);
			header("Location: /users");
			exit();
		}
		else
			$content = renderView('login/login', array(), $config);
		break;
	case 'logout':
		session_destroy();
		header ("Location: /index");
		exit();
	default:
		break;
}

$params = array('content'=>$content);
echo renderLayout("layout_login", $params, $config);

?>