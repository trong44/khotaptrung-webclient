<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hide', function($alias) {
            return "<?php if (!in_array(\Request::route()->getName(), config('theme-config.'.$alias))): ?>";
        });

        Blade::directive('endhide', function() {
            return '<?php endif; ?>';
        });
    }
}
