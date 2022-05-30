<?php

use db\Query;

require_once(dirname(__FILE__, 2) . '/config/settings.php');

// LinkDb::getConnection();

$query = new Query();
$query->select(['name', 'is_admin', 'email']);
$query->from('users');
$query->where([
    'name' => 'admin',
    'is_admin' => 1,
    'email' => 'admin@root.com.br'
]);

var_dump($query->execute());die;
