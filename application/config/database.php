<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

if(ENVIRONMENT == 'production')
{
	// $db['default']['hostname'] = 'serverportfolio';
	// $db['default']['username'] = 'server_admin@serverportfolio';
	// $db['default']['password'] = 'postit@123';
	// $db['default']['database'] = 'dashboard';
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'azure';
	$db['default']['password'] = '6#vWHD_$';
	$db['default']['database'] = 'dashboard';

else
{
	// $db['default']['hostname'] = 'serverportfolio';
	// $db['default']['username'] = 'server_admin@serverportfolio';
	// $db['default']['password'] = 'postit@123';
	// $db['default']['database'] = 'dashboard';
	
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'azure';
	$db['default']['password'] = '6#vWHD_$';
	$db['default']['database'] = 'dashboard';
}
	
}

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

//end of database.php