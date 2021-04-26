<?php
session_start();
ob_start();

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
defined('ROOT') ? null : define('ROOT',$_SERVER['DOCUMENT_ROOT'].DS.'fitness_land');

$db['db_host'] = 'localhost';
$db['db_user']='root';
$db['db_pass']='';
$db['db_name']='fitness_land';

foreach ($db as $key => $value){
    define(strtoupper($key),$value);
}


