<?php

namespace src\controllers;

use src\domain\utilities\ErrorCodes;
use src\infra\exception\UserException;

class DayRecordsController
{
    public function index($params)
    {
        try {
            var_dump('cheegou no index');die;
            $user = requireUserBySession();
            return [
                'view' => 'day_records/index',
                'data' => ['name' => 'Danilo']
            ];        
        } catch(UserException $e) {
            $message = ErrorCodes::translate($e);

            setExceptionMessageAndRedirect('message', $message, '/');
        } catch(\Exception $e) {
            setExceptionMessageAndRedirect('message', ErrorCodes::ERROR_500, '/');
        }
    }
}