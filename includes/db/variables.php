<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'mysqlJJ003nz';
$db['db_name'] = 'cms';

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}
