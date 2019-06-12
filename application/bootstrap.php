<?php

$config = readConfig('../application/configs/config.ini', 'production');
$cnx=connect($config);

		
/* Aqui se crearia la sesion, se crearian las cookies,
 * y se verificaria que el usuario esta autenticado */
session_start();

$arrayRequest=setRequest();
if(isset($_SESSION['iduser']))
	$user = readUser($_SESSION['iduser'], $cnx);
else
	$user['roles_idrole']='4';

$arrayRequest = acl($arrayRequest, $user['roles_idrole'], $cnx);

switch($arrayRequest['controller'])
{
	case 'login':
		include("../application/controllers/login.php");
	break;
	case 'users':
		include("../application/controllers/users.php");
	break;
	case 'error':
		include("../application/controllers/error.php");
	break;
	case 'index':
	default;
		include("../application/controllers/index.php");
	break;
}
?>