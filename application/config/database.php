<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

if(ENVIRONMENT == 'production')
{
	$db['default']['hostname'] = 'us-iron-auto-dca-02-a.cleardb.net';
	$db['default']['username'] = 'bb89bbe319b8e6';
	$db['default']['password'] = 'dd541f19';
	$db['default']['database'] = 'heroku_177f4e049d5be7a';
}
else
{
	$db['default']['hostname'] = 'us-iron-auto-dca-02-a.cleardb.net';
	$db['default']['username'] = 'bb89bbe319b8e6';
	$db['default']['password'] = 'dd541f19';
	$db['default']['database'] = 'heroku_177f4e049d5be7a';
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