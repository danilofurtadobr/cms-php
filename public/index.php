<?php

require '../vendor/autoload.php';
require 'bootstrap.php';

try{
    $data = router();

    //TODO: Certificar que não precisa dessa validação
    // if (!isset($data['data'])) {
    //     throw new Exception("Data array key does not exist.");
    // }

    if (isset($data['data'])) {
        extract($data['data']);
    }

    $view = $data['view'] . '.php';

    if (!isset($view)) {
        throw new Exception("View does not exist.");
    }

    if (!file_exists(VIEW_PATH . $view)) {
        throw new Exception("View '{$data['view']}' not found.");
    }

    require  VIEW_PATH . 'main.php';
}catch(Exception $e){
    var_dump($e->getMessage());
}
