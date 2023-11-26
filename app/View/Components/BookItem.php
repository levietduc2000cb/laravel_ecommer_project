<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     *
     */

     public $id;
     public $img;
     public $name;
     public $author;
     public $stars;
     public $reviewers;
     public $price;
    public function __construct($id,$img,$name,$author,$stars,$reviewers,$price)
    {
        $this->id = $id;
        $this->img = $img;
        $this->name = $name;
        $this->author = $author;
        $this->stars = $stars;
        $this->reviewers = $reviewers;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('user.components.book-item');
    }
}
