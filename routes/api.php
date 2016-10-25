<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('/translate/en-th', 'TranslateController@translateENtoTH');

Route::post('/translate/th-en', 'TranslateController@translateTHtoEN');

Route::get('/quick_translate/en-th/{word}', 'TranslateController@quickTranslateENtoTH');

Route::get('/quick_translate/th-en/{word}', 'TranslateController@quickTranslateTHtoEN');
/*

http://localhost/TheDict/public/api/quick_translate/en-th/cat

*/