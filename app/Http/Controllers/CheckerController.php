<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckerController extends Controller
{

    function init_parser()
    {
        $options = getopt("t:d:u:p:", ["debug"]);
        if (!isset($options["t"])) {
            exit("ERROR: missing 'targets' option\n");
        }
        return $options;
    }
    
    function setup_logger($options)
    {
        global $logger;
        $logger = [];
    
        if (isset($options["debug"])) {
            $logger["level"] = "DEBUG";
        } else {
            $logger["level"] = "INFO";
        }
    
        $log_colors = [
            "DEBUG" => "\033[1;31m",
            "INFO" => "\033[0;32m",
            "WARNING" => "\033[1;33m",
            "ERROR" => "\033[0;31m",
            "CRITICAL" => "\033[0;34m",
        ];
        $formatter = "[%s] - %s\033[0m";
        $logger["formatter"] = $formatter;
        $logger["colors"] = $log_colors;
    }
    
}
