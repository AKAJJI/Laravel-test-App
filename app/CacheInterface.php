<?php

namespace App;

interface CacheInterface {
    public function set($key,$value);
    public function get($key);
}
?>
