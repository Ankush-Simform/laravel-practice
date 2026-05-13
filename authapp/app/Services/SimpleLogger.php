<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
class SimpleLogger
{
    /**
     * Create a new class instance.
     */
    public function log($message)
    {
        Log::info("SimpleLogger:" . $message);
        return "Logged: ". $message;
    }
}
