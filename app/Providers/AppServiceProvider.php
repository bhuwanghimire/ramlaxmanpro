<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use App\Models\Aboutus;
use App\Models\Team;
use App\Models\Testimonial;

use Illuminate\Support\Facades\View;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //  $profile = Profile::all();
        $aboutus = Aboutus::all();
        $teams = Team::all();
        $testimonial = Testimonial::all();
        $profile=DB::table('profiles')->get();
      
        View::share('profiles', $profile);
        View::share('aboutus', $aboutus);
        View::share('teams', $teams);
        View::share('testimonials', $testimonial);
    }
}
