<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/azerty", function(){
//     return view('test');
// });

// Route::get("/gn/{slug}-{id}", function($slug,$id){
//     return "hello $slug $id";
// })  ->where('slug', '[a-z0-9\-]+')
//     ->where('id','[0-9]+');

// Route::group(['prefix' => 'gn','middleware' => 'ip'], function () {

//     Route::get('hey',function(){
//         return 'hey, sup';
//     });
// });

// Route::get('testC','testConstroller@index');

// Route::get('links/create','LinksController@create');
// Route::post('links/create','LinksController@store');
Route::get('r/{link}',['as' => 'link.show','uses'=>'LinksController@show'])->where('link','[0-9]+');
Route::resource('link', 'LinksController',['only' =>['create','store']]);

Route::resource('news','PostsController');

// //Inversion de controle service container
// App::bind('App\CacheInterface','App\CacheFile');

// Route::get('/a',function(App\CacheInterface $cache){
//     dd($cache);
// });

//Facade

Route::get('/facade',function(){
    dd(Cache2::get('test'));
});

Route::group(['namespace' => 'Admin','prefix' => 'admin','as' => 'admin.','middleware' => 'can:manage.users'], function () {
    Route::resource('posts', 'PostsController');
    Route::resource('users','UsersController',['except' =>['create','store','show']]);
    // Route::delete('users/{id}','UsersController@destroy');
});
//or
// Route::namespace('Admin')->prefix('admin')->name('Admin.')->group(function(){
//     Route::resource('posts', 'PostsController');
//     Route::resource('users','UsersController',['except' =>['create','store','show']]);
// });

//Route::get('login', [ 'as' => 'login','uses' => 'Auth\LoginController@redirectTo']);



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Auth::routes(['verify' => true]);


// Route::get('/email',function(){
//     Mail::to('email@email.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });
