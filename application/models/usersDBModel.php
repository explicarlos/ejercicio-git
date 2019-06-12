<?php

function readUserPets($id,$cnx)
{
	$arrayPets = array();
	
	/* La consulta que sugiere Agustin es:
	$sql = "SELECT pet
			FROM users
			LEFT JOIN users_has_pets
					  ON users.iduser=users_has_pets.users_iduser
			LEFT JOIN pets
					  ON users_has_pets.pets=pets_idpet.pets.idpet
			WHERE iduser=".$user['iduser'];
	 */
	$sql = "SELECT pet
			FROM pets
			INNER JOIN users_has_pets ON
				  users_has_pets.users_iduser=".$id." AND
				  users_has_pets.pets_idpet=pets.idpet;";
	$results = query($sql,$cnx);
	foreach ($results as $result)
		$arrayPets[] = $result['pet'];
	return $arrayPets;
}

function readUserLanguages($id,$cnx)
{
	$arrayLanguages = array();
	
	$sql = "SELECT language
			FROM languages
			INNER JOIN users_has_languages ON
				  users_has_languages.users_iduser=".$id." AND
				  users_has_languages.languages_idlanguage=languages.idlanguage;";
	$results = query($sql,$cnx);
	foreach ($results as $result)
		$arrayLanguages[] = $result['language'];
	return $arrayLanguages;
}

function readUsers($cnx)
{
	$sql = "SELECT iduser,name,email,password,description,city,coders,photo
			FROM users
			INNER JOIN cities ON
				  users.cities_idcity=cities.idcity;";
	$arrayUsers = query($sql,$cnx);
	foreach($arrayUsers as $key => $user)
	{
		$arrayUsers[$key]['pets'] = implode(",",
										readUserPets($arrayUsers[$key]['iduser'],$cnx));
		$arrayUsers[$key]['languages'] = implode(",",
										readUserLanguages($arrayUsers[$key]['iduser'],$cnx));
	}
	return $arrayUsers;
}

function readUser($id, $cnx)
{
	$sql = "SELECT *
			FROM users
			WHERE iduser='".$id."';";
	$arrayUser = query($sql,$cnx);
	return $arrayUser[0];
}

function insertUser($arrayData, $cnx, $imageName)
{
	$sql="INSERT INTO users SET
			name = '".(array_key_exists('name',$arrayData) ? $arrayData['name']: '')."',
			email = '".(array_key_exists('email',$arrayData) ? $arrayData['email']: '')."',
			cities_idcity = '".(array_key_exists('city',$arrayData) ? $arrayData['city']: '')."',
			description = '".(array_key_exists('description',$arrayData) ? $arrayData['description']: '')."',
			password = '".(array_key_exists('password',$arrayData) ? $arrayData['password']: '')."',
			coders = '".(array_key_exists('coder',$arrayData) ? $arrayData['coder']: '')."',
			photo = '".$imageName."';
		 ";
	query($sql,$cnx);
	$sql="SELECT LAST_INSERT_ID() as id;";
	$array=query($sql,$cnx);
	$iduser=$array[0]['id'];
	
	foreach($arrayData['pets'] as $idpet)
	{
		$sql="INSERT INTO users_has_pets SET
				users_iduser = '".$iduser."',
				pets_idpet = '".$idpet."';
			 ";
		query($sql,$cnx);
	}
	
	foreach($arrayData['languages'] as $idlanguage)
	{
		$sql="INSERT INTO users_has_languages SET
				users_iduser = '".$iduser."',
				languages_idlanguage = '".$idlanguage."';
			 ";
		query($sql,$cnx);
	}
	
	return $iduser;
}

function updateUser($arrayData, $id, $cnx, $imageName)
{
	return $numRows;
}

function deleteUser($id, $cnx)
{
	return $numRows;
}

function readPets($cnx)
{
	$sql="SELECT idpet AS id, pet AS value
			FROM pets";
	$arrayPets = query($sql,$cnx);
	return $arrayPets;
}

function readLanguages($cnx)
{
	$sql="SELECT idlanguage AS id, language AS value
			FROM languages";
	$arrayLanguages = query($sql,$cnx);
	return $arrayLanguages;
}

function readCoders($cnx)
{
	//FIXME: Normalizar las tablas
	
	$sql="SELECT coder AS id, coder AS value
			FROM coders";
	$arrayCoders = query($sql,$cnx);
	return $arrayCoders;
}

function readCities($cnx)
{
	$sql="SELECT idcity AS id, city AS value
			FROM cities";
	$arrayCities = query($sql,$cnx);
	return $arrayCities;
}
?>