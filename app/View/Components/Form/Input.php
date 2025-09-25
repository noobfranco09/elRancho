<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $label;
    public string $type;
    public ?string $value;
    public string $placeholder;
    public bool $required;
    public string $span;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $label,
        string $type = "text",
        ?string $value = null,
        string $placeholder = "",
        bool $required = false,
        string $span = "col-span-6 sm:col-span-3"

    ) {

        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->span = $span;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
