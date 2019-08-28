<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\View\View;
use Cart;
use App\Category;
use App\Company;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      view()->composer('site/*', function(View $view) {
        $data = array(
          'categories' => Category::orderBy('created_at', 'DESC')->get(),
          'companies' => Company::orderBy('created_at', 'DESC')->get(),
          'cartCount' => Cart::content()->count(),
        );
        $view->with($data);
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //
    }
}
