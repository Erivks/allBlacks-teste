<?php

namespace Src;

class Logger {

    public static function add(
        String $message, 
        String $script, 
        $level = 'ERROR', 
        $file = 'system.log'): void {
    
        date_default_timezone_set('America/Sao_Paulo');
        
        //get the current date
        $date = date("d-m-Y H:i:s");
    
        $script = basename($script); 
    
        $level = strtoupper($level);
    
        $logFinal =  "[$date] [$level]" . PHP_EOL . 
                        "\tSCRIPT: $script" . PHP_EOL .
                        "\t$level - $message" . PHP_EOL;
    
        file_put_contents($file, $logFinal, FILE_APPEND);
    }
}