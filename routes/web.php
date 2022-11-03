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


/*Route::get('/', function () {
    return view('welcome')
    });*/

Route::get("/", "TasksController@index");

//ログイン状態でないとタスクの作成、編集、削除、表示（詳細表示のみ）ができない。
Route::group(["middleware"=>["auth"]], function(){
    Route::resource("tasks", "TasksController", ["only" => ["store", "create", "show", "update", "destroy", "edit"]]);
});

// ユーザ登録
Route::get("signup", "Auth\RegisterController@showRegistrationForm")->name("signup.get");
Route::post("signup", "Auth\RegisterController@register")->name("signup.post");

//認証(ログインとログアウト)
Route::get("login", "Auth\LoginController@showLoginForm")->name("login.get");
Route::post("login", "Auth\LoginController@login")->name("login.post");
Route::get("logout", "Auth\LoginController@logout")->name("logout.get");