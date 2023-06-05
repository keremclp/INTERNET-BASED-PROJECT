<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    protected $name;
    protected $array;
    public function __construct($name,$array)
    {
        $this->name = $name;
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb',[
            "name" => $this->name,
            "array" => $this->array
        ]);
    }
}
