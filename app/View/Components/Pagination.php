<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     */
    public $pagination;
    public $nameRoute;
    public $count;
    public $search;
    public function __construct($pagination, $nameRoute, $count, $search)
    {
        $this->pagination = $pagination;
        $this->nameRoute = $nameRoute;
        $this->count = $count;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
