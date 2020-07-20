<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(120);

        Blade::directive('qbmoney', function ($money) {
            return "<?php echo '<small>$</small> '.number_format($money, 2); ?>";
        });

        Blade::directive('cleaemail', function ($email) {
            $email = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $email);
            // Remove any runs of periods (thanks falstro!)
            $email = mb_ereg_replace("([\.]{2,})", '', $email);
                        
            return $email;
        });

    }
}
