<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalDelete extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $id;
    public $route;
    public function __construct($name,$id,$route)
    {
        $this->name = $name;
        $this->id = $id;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-delete');
    }
}
