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
    return view('app.main');
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

Route::get('/browse/all', function () {
    return view('browse.all');
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

Route::get('/user/links', function () {
    return view('user.links'); 
});

Route::get('/user/collections', function () {
    return view('user.collections'); 
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
Route::get('/api/link/getlink/{link_id}', ['as' => 'api.link.getlink', 'uses' => 'linkController@getlink']);
Route::post('/api/link/update', ['as' => 'api.link.update', 'uses' => 'linkController@update']);
Route::get('/api/link/refresh/{link_id}', ['as' => 'api.link.refresh', 'uses' => 'linkController@refresh']);
Route::get('/api/link/mylinks', ['as' => 'api.link.mylinks', 'uses' => 'linkController@mylinks']);
Route::post('/api/link/mylinks', ['as' => 'api.link.mylinks.post', 'uses' => 'linkController@mylinks']);
Route::get('/api/link/collection/{collection_id}', ['as' => 'api.link.collection', 'uses' => 'linkController@collection']); 
Route::post('/api/link/collectionbyhash', ['as' => 'api.link.collectionbyhash', 'uses' => 'linkController@collectionbyhash']); 
Route::get('/api/link/visit/{link_id}', ['as' => 'api.link.visit', 'uses' => 'linkController@visit']); 
Route::get('/api/link/user/{user_id}', ['as' => 'api.link.user', 'uses' => 'linkController@user']); 
Route::post('/api/link/search', ['as' => 'api.link.search', 'uses' => 'linkController@search']); 
Route::delete('/api/link/delete/{link_id}', ['as' => 'api.link.delete', 'uses' => 'linkController@delete']); 
Route::post('/api/link/upload', ['as' => 'api.link.upload', 'uses' => 'linkController@upload']); 
Route::get('/api/link/linktocollection/{link_id}/{collection_id}', ['as' => 'api.link.linktocollection', 'uses' => 'linkController@linktocollection']); 
//collection
Route::post('/api/collection/add', ['as' => 'api.collection.add', 'uses' => 'collectionController@create']);
Route::get('/api/collection/all', ['as' => 'api.collection.all', 'uses' => 'collectionController@all']);
Route::get('/api/collection/mycollections', ['as' => 'api.collection.mycollections', 'uses' => 'collectionController@mycollections']);
Route::post('/api/collection/mycollections', ['as' => 'api.collection.mycollections.post', 'uses' => 'collectionController@mycollections']);
Route::get('/api/collection/user/{user_id}', ['as' => 'api.collection.user', 'uses' => 'collectionController@user']);
Route::get('/api/collection/getcollection/{collection_id}', ['as' => 'api.collection.getcollection', 'uses' => 'collectionController@getcollection']);
Route::get('/api/collection/getcollectionbyhash/{collection_id}', ['as' => 'api.collection.getcollectionbyhash', 'uses' => 'collectionController@getcollectionbyhash']);
Route::post('/api/collection/update', ['as' => 'api.collection.update', 'uses' => 'collectionController@update']);
Route::delete('/api/collection/delete/{collection_id}', ['as' => 'api.collection.delete', 'uses' => 'collectionController@delete']);
Route::delete('/api/collection/delete/{collection_id}/{link_id}', ['as' => 'api.collection.deletelinkcollection', 'uses' => 'collectionController@deletelinkcollection']);
Route::post('/api/collection/upload', ['as' => 'api.collection.upload', 'uses' => 'collectionController@upload']); 
//user
Route::get('/api/user/show/{user_id}', ['as' => 'api.user.show', 'uses' => 'userController@show']);
Route::post('/api/user/login', ['as' => 'api.user.login', 'uses' => 'userController@login']);
Route::post('/api/user/login/google', ['as' => 'api.user.login.google', 'uses' => 'userController@loginGoogle']);
Route::get('/api/user/login/google', ['as' => 'api.user.login.google', 'uses' => 'userController@loginGoogle']);
//Route::post('/api/user/loginupload', ['as' => 'api.user.loginupload', 'uses' => 'userController@loginupload']);
Route::post('/api/user/signup', ['as' => 'api.user.signup', 'uses' => 'userController@signup']);
Route::get('/api/user/all', ['as' => 'api.user.all', 'uses' => 'userController@all']);
Route::get('/api/user/loggedin', ['as' => 'api.user.loggedin', 'uses' => 'userController@loggedin']);
Route::get('/api/user/logout', ['as' => 'api.user.logout', 'uses' => 'userController@logout']);
Route::post('/api/user/search/', ['as' => 'api.user.search', 'uses' => 'userController@search']);
//category
Route::get('/api/category/all/', ['as' => 'api.category.all', 'uses' => 'categoryController@all']);

//browse
Route::get('/api/link/recent', ['as' => 'api.link.recent', 'uses' => 'linkController@recent']);
Route::get('/api/collection/recent', ['as' => 'api.collection.recent', 'uses' => 'collectionController@recent']);