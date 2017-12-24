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



## Pages

Route::get('/', function () {
    return view('app.template2');
});


Route::get('/test', ['as' => 'test', 'uses' => 'userController@test']);
Route::get('/testsignup', ['as' => 'testsignup', 'uses' => 'userController@signup']);

Route::get('/login', function () {
    return view('login.login');
});


Route::get('/signup', function () {
    return view('login.signup');
});







## angular views 
Route::get('/home', function () {
    return view('info.home');
});

Route::get('/addlink', function () {
    return view('link.addlink');
});

Route::get('/search', function () {
    return view('search.search');
});

Route::get('/link/all', function () {
    return view('link.all');
});

Route::get('/collection/all', function () {
    return view('collection.all');
});

Route::get('/collection/single', function () {
    return view('collection.single');
});






Route::get('/user', function () {
    return view('user.profile'); 
});

Route::get('/user/settings', function () {
    return view('user.settings'); 
});

Route::get('/user/list', function () {
    return view('user.list');
});
 
Route::get('/library/links', function () {
    return view('library.mylinks');
});

Route::get('/library/collections', function () {
    return view('library.mycollections');
});





## api calls
//link
Route::get('/api/link/add', ['as' => 'api.link.addlink', 'uses' => 'linkController@create']);
Route::post('/api/link/add', ['as' => 'api.link.add', 'uses' => 'linkController@create']);
Route::post('/api/link/addmany', ['as' => 'api.link.addmany', 'uses' => 'linkController@createmany']);
Route::get('/api/link/getdata', ['as' => 'api.link.getdata', 'uses' => 'linkController@getdata']);
Route::get('/api/link/all', ['as' => 'api.link.all', 'uses' => 'linkController@all']);
Route::get('/api/link/all', ['as' => 'api.link.all', 'uses' => 'linkController@all']);
Route::get('/api/link/getlink/{link_id}', ['as' => 'api.link.getlink', 'uses' => 'linkController@getlink']);
Route::post('/api/link/update', ['as' => 'api.link.update', 'uses' => 'linkController@update']);
Route::get('/api/link/mylinks', ['as' => 'api.link.mylinks', 'uses' => 'linkController@mylinks']);
Route::get('/api/link/collection/{collection_id}', ['as' => 'api.link.collection', 'uses' => 'linkController@collection']); 
Route::get('/api/link/visit/{link_id}', ['as' => 'api.link.visit', 'uses' => 'linkController@visit']); 
Route::get('/api/link/user/{user_id}', ['as' => 'api.link.user', 'uses' => 'linkController@user']); 
Route::post('/api/link/search', ['as' => 'api.link.search', 'uses' => 'linkController@search']); 
//collection
Route::post('/api/collection/add', ['as' => 'api.collection.add', 'uses' => 'collectionController@create']);
Route::get('/api/collection/all', ['as' => 'api.collection.all', 'uses' => 'collectionController@all']);
Route::get('/api/collection/mycollections', ['as' => 'api.collection.mycollections', 'uses' => 'collectionController@mycollections']);
Route::get('/api/collection/user/{user_id}', ['as' => 'api.collection.user', 'uses' => 'collectionController@user']);
//user
Route::get('/api/user/show/{user_id}', ['as' => 'api.user.show', 'uses' => 'userController@show']);
Route::post('/api/user/login', ['as' => 'api.user.login', 'uses' => 'userController@login']);
Route::post('/api/user/signup', ['as' => 'api.user.signup', 'uses' => 'userController@signup']);
Route::get('/api/user/all', ['as' => 'api.user.all', 'uses' => 'userController@all']);
Route::get('/api/user/loggedin', ['as' => 'api.user.loggedin', 'uses' => 'userController@loggedin']);
Route::get('/api/user/logout', ['as' => 'api.user.logout', 'uses' => 'userController@logout']);
Route::post('/api/user/search/', ['as' => 'api.user.search', 'uses' => 'userController@search']);
//category
Route::get('/api/category/all/', ['as' => 'api.category.all', 'uses' => 'categoryController@all']);
