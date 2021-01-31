<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CacheFileServiceProvider extends ServiceProvider{


    protected $defer=true;

    // public function boot(){
    //     dd('boot');
    // }

    public function register(){
        // die('test');
        $this->app->bind('App\CacheInterface','App\CacheFile');
    }

    public function provides(){
        return['App\CacheInterface']; //ce qui veut dire qu 'on ne retourne la fonction que register que si on utilise l'alias App\CacheInterface dans notre container
    }
}
