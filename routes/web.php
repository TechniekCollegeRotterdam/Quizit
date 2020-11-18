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

Route::get('quizzes/{quiz}/quiz', 'QuizController@delete')
    ->name('quizzes.delete');
Route::resource('/quizzes', 'QuizController');

Route::get('questions/{question}/question', 'QuestionController@delete')
    ->name('questions.delete');

//Route::get('questions/{question}/question', 'QuestionController@create',$quiz->id)
//    ->name('questions.create');


Route::resource('/questions', 'QuestionController');

Route::resource('/game', 'GameController');
Route::resource('/gameAnswer', 'GameanswerController');
