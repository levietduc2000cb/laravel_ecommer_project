<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitleProfile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $img;
    public $titleName;
    public function __construct($img,$titleName)
    {
        $this->img = $img;
        $this->titleName = $titleName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.components.page-title-profile');
    }
}
