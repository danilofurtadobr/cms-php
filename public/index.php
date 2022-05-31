<?php

use db\Query;

require_once(dirname(__FILE__, 2) . '/config/settings.php');

$query = new Query();
$query->select(['*']);
$query->from('users');
$query->where([
    'is_admin' => 0,
]);

echo '<pre>';
var_dump($query->all());die;
