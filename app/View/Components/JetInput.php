<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JetInput extends Component
{
    public $type;
    public $placeholder;
    public $model;

    public function __construct($type = 'text', $placeholder = '', $model = '')
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->model = $model;
    }

    public function render()
    {
        return view('components.jet-input');
    }
}
