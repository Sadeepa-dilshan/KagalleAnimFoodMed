<?php

namespace App\View\Components;

use Closure;
use App\Models\Food;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AnimalFoodEditModal extends Component
{
    public $foods;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->foods = Food::select('id', 'name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animal-food-edit-modal');
    }
}
