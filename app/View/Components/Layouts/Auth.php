<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Auth extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public String $title;
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.auth');
    }
}
