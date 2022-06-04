<?php

require '../vendor/autoload.php';
require 'bootstrap.php';

try{
    $data = router();

    extract($data['data']);
    $view = $data['view'] . '.php';

    if (!isset($view)) {
        throw new Exception("View does not exist.");
    }

    if (!file_exists(VIEW_PATH . $view)) {
        throw new Exception("View '{$data['view']}' not found.");
    }

    require  VIEW_PATH . 'layout.php';
}catch(Exception $e){
    var_dump($e->getMessage());
}
