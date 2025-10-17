<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public ?string $label = null;
    public string $type;
    public ?string $value;
    public string $placeholder;
    public bool $disabled;
    public bool $required;
    public string $span;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $label = null,
        string $type = "text",
        ?string $value = null,
        string $placeholder = "",
        bool $disabled = false,
        bool $required = false,
        string $span = "col-span-6 sm:col-span-3",

    ) {

        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
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
