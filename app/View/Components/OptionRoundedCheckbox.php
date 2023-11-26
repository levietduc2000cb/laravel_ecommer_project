<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OptionRoundedCheckbox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $classCustom;
    public $labelKeyName;
    public $checkedOption;
    public function __construct($id,$name,$classCustom='',$labelKeyName='',$checkedOption=[])
    {
        $this->id = $id;
        $this->name = $name;
        $this->classCustom = $classCustom;
        $this->labelKeyName = $labelKeyName;
        $this->checkedOption = $checkedOption;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.components.option-rounded-checkbox');
    }
}
