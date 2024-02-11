<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JetDialogModal extends Component
{
    public $show;
    public $modalId;
    public $modalLabel;
    public $title;
    public $content;

    public function __construct($show = false, $title = '', $modalId = '', $content = '', $modalLabel = '')
    {
        $this->show = $show;
        $this->title = $title;
        $this->modalLabel = $modalLabel;
        $this->content = $content;
        $this->modalId = $modalId;
    }

    public function render()
    {
        return view('components.jet-dialog-modal');
    }
}
