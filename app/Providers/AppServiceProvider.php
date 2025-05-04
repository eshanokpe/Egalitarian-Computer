<?php

namespace App\Providers;

use DB;
use View;
use App\Models\Slider;
use App\Models\Course;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
 
    /**
     * Bootstrap any application services.
     */
    
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        if ($this->databaseExists()) {
           
            if (Schema::hasTable('courses')) {
                View::share('courses', Course::oldest()->paginate(20));
                View::share('randomCourses', Course::inRandomOrder()->limit(3)->get());
            }
            if (Schema::hasTable('sliders')) {
                View::share('sliders', Slider::all()->shuffle()); 
            } 
 
        }
    }

    private function databaseExists(): bool
    {
        try {
           
            // Additionally check if the database name is configured
            if(DB::connection()->getDatabaseName()){
                return true;
            } else {
                // No database name configured, treat as non-existent connection
                return false;
            }
        } catch (\Exception $e) {
            // Catch any exception during connection attempt (e.g., wrong credentials, host down)
            return false;
        }
    }

}