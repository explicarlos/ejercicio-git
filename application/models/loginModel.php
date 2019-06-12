<?php

function loginUser($cnx, $arrayData)
{
	$sql = "SELECT iduser, name
			FROM users
			WHERE email='".$arrayData['email']."' AND
				  password='".$arrayData['password']."';";
	$user = query($sql,$cnx);
	
	if(count($user)==1) // algo muy chugo ha sucedido con la BdD
	{
		$_SESSION['iduser']=$user[0]['iduser'];
		$_SESSION['name']=$user[0]['name'];
		return TRUE;
	}
	else
		return FALSE;
}
?>