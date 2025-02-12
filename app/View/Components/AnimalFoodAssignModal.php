<?php

namespace App\View\Components;

use Closure;
use App\Models\Food;
use App\Models\Animal;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AnimalFoodAssignModal extends Component
{
    public $animals;
    public $foods;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->animals = Animal::select('id', 'name')->get();
        $this->foods = Food::select('id', 'name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.animal-food-assign-modal');
    }
}
