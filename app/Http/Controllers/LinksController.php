<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class LinksController extends Controller
{

    public function create(){
        return view('links.create');
    }

    public function store(){
        // dd(\Request::get('url'));
        // dd(\Request::post('url'));

        $url = \Request::post('url');
        // $link = Link::where('url',$url)->first();
        // if (!$link){
        //     $link = Link::create(['url' => $url]);
        // } On peut remplacer ce block par la methode ci dessous
            $link =  Link::FirstOrCreate(['url' => $url]);

        return view('links.success',compact('link'));
    }


    public function show($id){
        $link = Link::findOrFail($id);
         //return new RedirectResponse($link->url,301); //or
        return redirect($link->url);
    }
}

