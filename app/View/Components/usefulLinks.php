<?php

namespace App\View\Components;

use Illuminate\View\Component;

class usefulLinks extends Component
{
    public $class = null;
    public $contactLink = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class=null, $contactLink=false)
    {
        $this->class = $class;
        $this->contactLink = $contactLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.useful-links');
    }
}
