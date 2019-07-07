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

Route::get('/', function () {
    return view('pages/home');
});

/* Ofertas */
Route::get('/internship', 'OffersController@index')->name('offers');
Route::get('/internship/filter={industry}', 'OffersController@filterBy')->where('industry', '[a-z]+_?[a-z]*');

/* Job Description */
Route::get('/internship/{offer}', 'OffersController@single')->where('offer', '[0-9]+');

/* Aprende Chino */
Route::get('/learn', function() {
    $params = (object) array(
        'title' => "Aprende Chino",
    );
    return view('pages/learn-chinese', compact('params'));
});

/* Universidad */
Route::get('/university', function() {
    return view;
});

/* Why Us */
Route::get('/why', function() {
    return view('pages/why-intuuchina');
});

/* Login */
Route::get('/login', function() {
    return view('pages/login');
});

/* Términos y condiciones */
Route::get('/terms&conditions', function() {
    $params = (object) array(
        'title' => "Términos y condiciones",
    );
    return view('pages/terms-and-conditions', compact('params'));
})->name('terms&conditions');

/* Reglamento General de protección de datos */
Route::get('/gdpr', function() {
    $params = (object) array(
        'title' => "Ley de protección de datos",
    );
    return view('pages/gdpr', compact('params'));
})->name('gdpr');

/* Política de privacidad */
Route::get('/privacy-policy', function() {
    $params = (object) array(
        'title' => "Política de privacidad",
    );
    return view('pages/privacy-policy', compact('params'));
});

/* Administrador */
Route::group(['middleware' => 'App\Http\Middleware\Admin'], function(){
    Route::match(['get', 'post'], '/admin/','HomeController@index');

    Route::get('/admin/offers', 'OffersController@admin')->name('admin.offers');
    Route::post('/admin/offers', 'OffersController@store');
});

/* Formulario de contacto del pie de página */
Route::post('/message','MailMessagesController@send')->name('mail');

/* Autenticación */
Auth::routes();

/* Home */
Route::get('/home', 'HomeController@index')->name('home');
