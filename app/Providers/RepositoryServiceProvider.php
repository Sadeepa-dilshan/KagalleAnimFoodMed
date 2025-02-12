<?php
namespace App\Providers;

use App\Repositories\FoodRepository;
use App\Repositories\AnimalRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AnimalFoodRepository;
use App\Repositories\FoodRepositoryInterface;
use App\Repositories\AnimalRepositoryInterface;
use App\Repositories\AnimalFoodRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AnimalRepositoryInterface::class, AnimalRepository::class);
        $this->app->bind(FoodRepositoryInterface::class, FoodRepository::class);
        $this->app->bind(AnimalFoodRepositoryInterface::class, AnimalFoodRepository::class);
    }
}
