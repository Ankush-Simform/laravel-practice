<?php
namespace App\Services;

class LoggerServices{
        public function log($message){
            return "Logged" . $message;
        }
}