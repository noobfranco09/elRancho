<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public string $title;
    public string $maxWidthClass;
    public string $action;
    public string $method;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id,
        string $title,
        string $action = "#",
        string $method = "POST",
        string $maxWidth = "2x1"
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
        $this->maxWidthClass = $maxWidth;
    }

    public function getMaxWidthClass(string $size)
    {
        return match ($size) {
            'sm' => 'max-w-sm',
            'md' => 'max-w-md',
            'lg' => 'max-w-lg',
            'xl' => 'max-w-xl',
            '2xl' => 'max-w-2xl',
            default => 'max-w-2xl',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
