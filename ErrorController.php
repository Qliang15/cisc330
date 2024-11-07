<?php

namespace app\controllers;

use Exception;
use Error;

function myErrorHandler($errno, $errstr, $errfile, $errline) {
    echo 'my error handler called';
    exit();
}

class ErrorController {

    public function viewErrors() {
        try {
            if (true) {
                throw new Exception('Where is Error');
            }
        } catch (Error $e) {
            echo 'Caught error';
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage();
        }

        set_error_handler("app\controllers\myErrorHandler");
        trigger_error('');
    }
}

