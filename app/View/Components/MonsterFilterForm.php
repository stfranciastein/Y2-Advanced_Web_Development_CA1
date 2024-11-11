<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MonsterFilterForm extends Component
{
    public $route;
    public $alignments;

    public function __construct($route, $alignments)
    {
        $this->route = $route;
        $this->alignments = $alignments;
    }

    public function render()
    {
        return view('components.monster-filter-form');
    }
}
