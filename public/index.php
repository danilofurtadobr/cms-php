<?php

use db\Query;

require_once(dirname(__FILE__, 2) . '/config/settings.php');

// Connection::getConnection();

$query = new Query();
$query->select(['*']);
$query->from('users');
$query->where([
    // 'name' => 'admin',
    'is_admin' => 0,
    // 'email' => 'admin@root.com.br'
]);

echo '<pre>';
var_dump($query->all());die;
