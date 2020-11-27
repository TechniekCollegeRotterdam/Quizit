<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('designs/{design}/delete', 'DesignController@delete')->name('designs.delete');
Route::resource('/designs', 'DesignController');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('quizzes/{quiz}/quiz', 'QuizController@delete')
        ->name('quizzes.delete');
    Route::resource('/quizzes', 'QuizController');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('questions/{question}/question', 'QuestionController@delete')
        ->name('questions.delete');
    Route::get('quizzes/{quiz}/questions/create', 'QuestionController@create')
        ->name('admin.questions.create');
    Route::post('quizzes/{quiz}/questions', 'QuestionController@store')
        ->name('admin.questions.store');

    Route::resource('/questions', 'QuestionController');
});


Route::resource('/game', 'GameController');
Route::resource('/gameAnswer', 'GameanswerController');
