<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectCustom extends Component
{
    /**
     * Create a new component instance.
     *
     *
     * @return void
     */

     public $mainTitle;
     public $mainId;
     public $options;

    public function __construct($mainTitle,$mainId,$options)
    {
        $this->mainTitle = $mainTitle;
        $this->mainId = $mainId;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.components.select-custom');
    }
}
