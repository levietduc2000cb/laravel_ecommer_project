<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $msg;
    public function __construct($type,$msg)
    {
        $this->type = $type;
        $this->msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toast');
    }
}
