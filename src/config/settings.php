<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

require_once(realpath(dirname(__FILE__) . '/ConnectionDb.php'));
//TODO: Descomentar assim que terminar de configurar o queryBuilder
// require_once(dirname(__FILE__, 2) . '/infra/db/Query.php');

define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers/'));
