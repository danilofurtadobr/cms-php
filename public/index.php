<?php

require '../vendor/autoload.php';
require 'bootstrap.php';

//TODO: Descomentar assim que terminar o login
// require_once(VIEW_PATH . '/login.php');

try{
    router();
}catch(Exception $e){
    var_dump($e->getMessage());
}
