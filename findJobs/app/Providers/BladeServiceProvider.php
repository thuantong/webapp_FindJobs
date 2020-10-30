<?php

namespace App\Providers;

use App\Models\DiaDiem;
use App\Models\NganhNghe;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        $diaDiem = DiaDiem::all()->toArray();
        View::share('dia_diem',$diaDiem);
        $nganhNghe = NganhNghe::all()->toArray();
        View::share('nganh_nghe',$nganhNghe);
        Blade::directive('money_xu', function ($money) {
            return "<?php echo number_format($money, 0); ?>";
        });
        //
    }
}
