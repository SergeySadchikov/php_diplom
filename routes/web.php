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
Route::resource('/', 'IndexController',[
    'only'=>['index'],
    'name'=>['home']
]);

Route::resource('questions', 'QuestionController')->only(['show']);
Route::resource('/add', 'QuestionController')->only(['store']);



Route::resource('answer','AnswerController',[
    'only'=>['store']
]);


Auth::routes();

//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Маршруты регистрации...
 */

//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');

/**
 * Маршруты admin
 */


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/',['uses' => 'Admin\IndexController@index', 'as' => 'adminIndex']);

    Route::resource('/categories', 'Admin\CategoriesController');
    Route::resource('/questions', 'Admin\QuestionsController');
    Route::resource('/reply', 'Admin\AnswerController');


});

