<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Noticia;
use App\Models\Evento;

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
        //
        $noticias = Noticia::all();
       view()->share('noticias',$noticias);
       $eventos = Evento::all();
       view()->share('eventos',$eventos);
    }
}
 