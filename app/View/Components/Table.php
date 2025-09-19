<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public array $headings;
    public string $name;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, array $headings = [])
    {
        $this->headings = $headings;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
