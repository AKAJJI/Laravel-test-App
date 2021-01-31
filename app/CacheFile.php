<?php
namespace App;

class CacheFile implements CacheInterface{

    public function get($key){
        return 'lol '.$key.' lol';
    }

    public function set($key,$value){

    }
}



?>
