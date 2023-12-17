<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Loading extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $backColor;
    public function __construct($backColor=null)
    {
        $this->backColor = $backColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.loading');
    }
}
