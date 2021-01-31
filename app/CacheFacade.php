<?php

namespace App;

use Illuminate\Support\Facades\Facade;

class CacheFacade extends Facade{
    protected static function getFacadeAccessor(){  return 'App\CacheInterface'; }
}
