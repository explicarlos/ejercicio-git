<?php

defined('APPLICATION_ENV')?:
	define ('APPLICATION_ENV', getenv('APPLICATION_ENV'));

defined('APPLICATION_PATH')?:
	define ('APPLICATION_PATH','../application');
	
defined('DOCUMENT_ROOT')?:
	define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
	
require_once(APPLICATION_PATH."/models/applicationModel.php");
require_once(APPLICATION_PATH."/models/usersModel.php");
require_once(APPLICATION_PATH."/models/usersDBModel.php");
require_once(APPLICATION_PATH."/models/mysqlModel.php");
require_once(APPLICATION_PATH."/models/debugModel.php");
require_once(APPLICATION_PATH."/views/helpers/formHelper.php");
	
require(APPLICATION_PATH."/bootstrap.php");

?>