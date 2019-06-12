<?php

// Initializing variables
$arrayUser = initArrayUser();

switch($arrayRequest['action'])
{
	case 'update':
		if($_POST)
		{
			$imageName = updateImage($_FILES, $_GET['id'], $config);
			updateUser($arrayData, $_GET['id'], $cnx, $imageName);
			header("Location: index.php?controller=users&action=select");
			exit();
		}
		else
		{
			$arrayUser=readUser($_GET['id'], $cnx);
			$params=array('arrayUser'=>$arrayUser,
						  'arrayDataPets'=>readPets($cnx),
						  'arrayUserPets'=>readUserPets($arrayUser['iduser'], $cnx),
						  'arrayDataCities'=>readCities($cnx),
						  'arrayUserCities'=>array($arrayUser['cities_idcity']),
						  'arrayDataCoders'=>readCoders($cnx),
						  'arrayUserCoders'=>array($arrayUser['coders']),
						  'arrayDataLanguages'=>readLanguages($cnx),
						  'arrayUserLanguages'=>readUserLanguages($arrayUser['iduser'], $cnx),
						 );
		}
		// CAUTION: There is no break; here!!!!!!!!!!
	case 'insert':
		if($_POST)
		{
			$imageName = (!$_FILES['photo']['error'] ? uploadImage($_FILES, $config) : '');
			$id=insertUser($_POST, $cnx, $imageName);
			header("Location: index.php?controller=users&action=select");
			exit();
		}
		else
		{
			$params=array('arrayUser'=>$arrayUser,
						  'arrayDataPets'=>readPets($cnx),
						  'arrayUserPets'=>array(),
						  'arrayDataCities'=>readCities($cnx),
						  'arrayUserCities'=>array(),
						  'arrayDataCoders'=>readCoders($cnx),
						  'arrayUserCoders'=>array(),
						  'arrayDataLanguages'=>readLanguages($cnx),
						  'arrayUserLanguages'=>array(),
						 );
			$content = renderView("users/formulario", $params, $config);
		}
		break;
	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='yes')
				deleteUser($_GET['id'], $cnx);
			header("Location: index.php?controller=users&action=select");
			exit();
		}
		else
		{
			$content = renderView("users/delete", array(), $config);
		}
		break;
	case 'index':
	case 'select':
		$arrayUsers = readUsers($cnx);
		$params=array('arrayUsers'=>$arrayUsers);
		$content = renderView("users/select", $params, $config);
	default:
		break;
}
$params = array('userName'=>(isset($_SESSION['name'])?$_SESSION['name']:'Guest'),
				'content'=>$content);
echo renderLayout("layout_admin1", $params, $config);
?>