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

Route::get('/',[

    'uses' => 'FrontEndController@index',
    'as' => 'index'

]);

Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
    
Route::resource('posts','PostController');
Route::get('posts/trash','PostController@trash');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories','CategoryController');
Route::resource('tags', 'TagController');

Route::resource('users','UserController');
Route::resource('profile','ProfileController');



});

Route::get('/test', function(){

    return App\Profile::find(1)->user;
});

Route::get('user/admin/{id}',[

    'uses' => 'UserController@admin',

    'as' => 'user.admin'
]);

Route::get('user/not_admin/{id}',[

    'uses' => 'UserController@not_admin',

    'as' => 'user.not_admin'
]);

Route::get('/settings',[

     'uses' => 'SettingsController@index',
     'as' => 'settings'

]);

Route::get('/settings/update',[

    'uses' => 'SettingsController@update',
    'as' => 'settings.update'

]);

Route::get('/post/{slug}', [

    'uses' => 'FrontEndController@singlepost',
    'as' => 'single.post'
]);

Route::get('/category/{id}', [

     'uses' =>'FrontEndController@category',

     'as' => 'category.single'
]);
Route::get('/tag/{id}',[

    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results', function(){
    
    $posts =\App\Post::where('title', 'like', '%' . request('query') . '%')->get();

      return view('results')->with('posts', $posts)
      ->with('title' , 'Search results : '. request('query'))
      ->with('categories',\App\Category::take(5)->get())
      ->with('settings',\App\Setting::first())
      ->with('query', request('query'));

});
Route::get('/subscribe', function(){

    $email = request('email');

    Newsletter::subscribe($email);
    
    Session:: flash('subscribed', 'Successfully subscribed');
    return redirect()->back();

});
