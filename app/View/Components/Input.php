<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $name;
    public $label;
  
    public $value;
    public function __construct($type,$label,$name,$value='')
    {
        $this->type=$type;
        $this->label=$label;
        $this->name=$name;
       
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
