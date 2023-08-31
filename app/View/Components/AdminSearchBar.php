<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminSearchBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $routeName;
    public $search;
    public $placeholder;
    public $routeSearch;
    public function __construct($routeName,$search,$placeholder,$routeSearch)
    {
        $this->routeName = $routeName;
        $this->search = $search;
        $this->placeholder = $placeholder;
        $this->routeSearch = $routeSearch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.admin-search-bar');
    }
}
