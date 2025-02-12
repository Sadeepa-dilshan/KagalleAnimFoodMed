<?php

namespace App\View\Components;

use Closure;
use App\Models\FoodCategory;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FoodEditModal extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = FoodCategory::select('id', 'name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.food-edit-modal');
    }
}
