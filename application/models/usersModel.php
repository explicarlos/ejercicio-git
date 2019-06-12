<?php

/** Upload photo in uploads
 * @param array $_FILES Array FILES
 * @param array $config Config variables
 * @return string: Final filename of the photograph
 */
function uploadImage($_FILES, $config)
{
	$destination = $config['uploadDirectory']."/".$_FILES['photo']['name'];
	$filename = $_FILES['photo']['tmp_name'];
	
	$path_parts = pathinfo($destination);
	$name=$path_parts['basename'];
	
	$i=0;
	while(in_array($name,scandir($config['uploadDirectory'])))
	{
		$i++;	
		$name=$path_parts['filename']."_".$i.".".$path_parts['extension'];
	}
	
	$destination = $config['uploadDirectory']."/".$name;
	move_uploaded_file($filename, $destination);
	return $name;
}

/** Update photo in uploads
 * @param array $_FILES Array FILES
 * @param int User id
 * @param array $config Config variables
 * @return string: Filename of the new photo
 */
function updateImage($_FILES, $id, $config)
{
	$arrayUser=readUserFromFile($id,$config);
	$image=trim($arrayUser[9]);
	if(!$_FILES['photo']['error'])
	{
		unlink($config['uploadDirectory']."/".$image); // deletes old photo
		$image=uploadImage($_FILES, $config);		   // uploads new photo
	}
	return $image;
}

/** Write user to .txt file
 * @param string $imageName Final filename of the photograph
 * @param array $config Config variables
 */
function writeToFile($imageName, $config)
{
	$arrayUser = array_merge(initArrayUserWithKeys(),$_POST);
	
	foreach($arrayUser as $key => $value)
	{
		if(is_array($value))
			$value=implode(',',$value);
		$arrayUser[$key]=trim($value);
	}	
	$arrayUser[]=$imageName;
	$textUser=implode('|',$arrayUser);
	
	appendUserToFile($textUser, $config);
}

/** Update user in .txt file
 * @param int $id User id
 * @param string $imageName Photo filename
 * @param array $config Config variables
 */
function updateToFile($id, $imageName, $config)
{
	// Reads users data from file
	$arrayUsers=readUsersFromFile($config);
		
	$arrayUser = array_merge(initArrayUserWithKeys(),$_POST);
	
	foreach($arrayUser as $key => $value)
	{
		if(is_array($value))
			$value=implode(',',$value);
		$arrayUser[$key]=trim($value);
	}	
	$arrayUser[]=$imageName;
	$textUser=implode('|',$arrayUser);
	
	$arrayUsers[$id]=$textUser;
	writeUsersToFile($arrayUsers, $config);
}

/** Read users from file
 * @param array $config Config variables
 * @return array: Users array
 */
function readUsersFromFile($config)
{
	// Ignore the final "\r\n" and other trash at the end/beginning of file
	$usersText = trim(file_get_contents($config['filename']));
	
	// Remove all newline chars ('\n') preceded by a <br /> tag
	$sustituye = array("<br />\n\r", "<br />\r\n", "br />\n");
	$usersText = str_replace($sustituye, "<br />\r", $usersText);

	// Remove BOM if exists
	$bom = pack("CCC", 0xef, 0xbb, 0xbf);
	if (0 == strncmp($usersText, $bom, 3))
		$usersText = substr($usersText, 3);
	
	// Segregate users delimited by the CR+LF sequence
	$arrayUsers=($usersText ? explode("\r\n",$usersText) : array());
	
	// Restore all newline chars previously removed and remove the <br /> tags
	foreach ($arrayUsers as $key => $value)
		$arrayUsers[$key] = str_replace("<br />\r","\r\n",$value);
	
	return $arrayUsers;
}

/** Append user to file
 * @param string $textUser User text
 * @param string $config Config variables
 */
function appendUserToFile($textUser, $config)
{
	// Since line feeds are allowed in form textareas, and \r\n delimits users
	// within the text file, we prefix those line feeds with the <br /> tag in
	// order to properly detect them when reading+parsing the text file
	$textUser=nl2br($textUser);
	
	file_put_contents($config['filename'],$textUser."\r\n",FILE_APPEND);
}

/** Write users to file
 * @param array $arrayUsers Users array
 * @param array $config Config variables
 */
function writeUsersToFile($arrayUsers, $config)
{
	// Precede line feeds with the <br /> tag
	foreach ($arrayUsers as $key => $value)
		$arrayUsers[$key] = nl2br($value);
	// Users segregated by the newline character ('\')
	$textUsers=implode("\r\n",$arrayUsers);
	// Write to file
	if($textUsers)
		file_put_contents($config['filename'],$textUsers."\r\n");
	else 
		file_put_contents($config['filename'],"");
}

/**
 * Read user from file to array
 * @param int $id Usr id
 * @param array $config Config variables
 * @return string: 
 */
function readUserFromFile($id, $config)
{
	// Read users
	$arrayUsers=readUsersFromFile($config);
	// Select data of user $id
	$arrayUser=$arrayUsers[$_GET['id']];
	$arrayUser=explode("|",$arrayUser);
	return($arrayUser);
}

/**
 * Initialize user array with keys
 * @return array: User array initialized
 */
function initArrayUser()
{
	$keys=array('id','name','email','password','description','pet','city','coder','languages','photo');
	$arrayUser=array();
	foreach($keys as $key)
		$arrayUser[$key]=NULL;
	return $arrayUser;
}

/*
/**
 * Initialize user array
 * @return array: User array initialized
 
function initArrayUser()
{
	$arrayUser=array();
	for($i=0;$i<10;$i++)
		$arrayUser[$i]=NULL;
	return $arrayUser;
}
*/

/**
 * Delete user from file and image from directory
 * @param int $id User id
 * @param array $config Config variables
 */
function deleteUserFromFile($id, $config)
{
	$arrayUser = readUserFromFile($id, $config);
	
	// Delete user photo
	$image = $arrayUser[9];
	$image=str_replace("\r", "", $image);
	$image=str_replace("\n", "", $image);
	unlink($config['uploadDirectory']."/".$image);

	// Deletes the user from the users array
	$arrayUsers=readUsersFromFile($config);
	unset($arrayUsers[$id]);
	
	// Rewrites the .txt file
	writeUsersToFile($arrayUsers, $config);
}
?>
