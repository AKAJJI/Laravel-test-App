<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\EditPostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index(){
        // dd(Session::get('_token'));
        // Session::put('key','value');
        // Session::put('key1.b','value2');
        // Session::put('key1.c',[1,2]);
        // Session::push('key1.c','value3');
        //dd(session('key1.c'));
        //dd(Session::all());

        // $posts = Post::get();
        //posts->load('category');



        $posts = Post::with('category')->get();

        //utile pour les sous-requetes
        // $posts = Post::with(['category' => function($query){
        //     $query->select('name');
        // }])->get();
        // $posts = Post::published()->get();
        // $posts = Post::searchByTitle('article')->get();
        // $posts = Post::published()->searchByTitle('article')->get();
        // $posts = Post::searchByTitle('article')->published()->get();


        return view('posts.index',compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
         $post =Post::create($request->except('_token','_method'));
        // $post->tags()->sync($request->get('tags'));
        return redirect('news');

    }


    public function show($id){
        $post = Post::published()->where('id',$id)->firstOrFail();
        return $post;
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = category::pluck('name','id');
        $tags= Tag::pluck('name','id');
        return view('posts.edit',compact('post','categories','tags'));
    }

    public function update($id, EditPostRequest $request /*Request $request*/){
        // dd($request->all());
        $post = Post::findOrFail($id);
        //1st way to validate:
        // $validator = \Validator::make($request->except('_token','_method'),[
        //     'title'=> 'required|min:5',
        //     'content' => 'required|min:10'
        // ]);
        // //dd($validator->fails());
        // //dd($validator->messages());

        // //dd($validator);

        // if($validator->fails()){
        //     return redirect(route('news.edit',$id))->withErrors($validator->errors());
        // }else{
        //     $post->update($request->except('_token','_method'));
        //     // $post->tags()->sync($request->get('tags'));
        //     return redirect('news');
        // }
        //2nd way to validate better than the first lesser lines of code
        // $this->validate($request,[
        //     'title'=> 'required|min:5',
        //     'content' => 'required|min:10'
        // ]);//or
        // $this->validate($request,Post::$rules);
        $post->update($request->except('_token','_method'));
        // Session::flash('success','L\'article a bien été sauvegardé');
        // $post->tags()->sync($request->get('tags'));
        return redirect('news')->with('success','L\'article a bien été sauvegardé');

    }



}
