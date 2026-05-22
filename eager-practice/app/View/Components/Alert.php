<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;
    public string $style;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;

        $this->style = match ($type) {
            'success' => 'background:green;color:white;',
            'error' => 'background:red;color:white;',
            'warning' => 'background:orange;color:black;',
            default => 'background:gray;color:white;',
        };
    }

    public function render()
    {
        return view('components.alert');
    }
}