<?php

namespace App\Http\Controllers;

use Request;


class testConstroller extends Controller
{
    public function index(){
        $var =Request::ip();

        return 'hello, ip: '.$var;
    }
}
