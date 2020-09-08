<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\category;
use App\Models\sub_category;
use DB;
use Cart;






/// để không bị lỗi S4201 trong migrate

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
        // dd($category);
        View::composer('*', function ($view){
            view()->share(['data2' => Cart::content(), 'data3' => Cart::subtotal(0,',','.') ]);
        });

        view()->composer('*', function ($view){
            // $catego = category::all();
            $catego =  category::all();

            // dd($catego);
            $view->with('catego', $catego);
        });
        /// để không bị lỗi S4201 trong migrate
        Schema::defaultStringLength(191);

        /// gọi hàm bằng package ko có bản

        view()->composer('*', function ($view){
            $category = category::all();
            $view->with('category', $category);
            // dd($category);
        });

        view()->composer('page.index', function ($view){
            $category2 = category::all();
            $view->with('category2', $category2);
        });




        // View::share('categories', $category);


        // Schema::defaultStringLength(191);

        // $banner= DB::table('banner')->where('banner_type','banner')
        // ->orderBy('banner_id', 'desc')
        // ->limit(4)
        // ->get();
        // View::share('banner', $banner);




    }
}
