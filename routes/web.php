<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    // Dashboard Rotes...
    Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
        Route::post('login', 'Auth\LoginController@login')->name('login');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');

        // Home Routes...
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // Device Routes...
        Route::resource('devices', 'DeviceController');

        // Brand Routes...
        Route::resource('brands', 'BrandController');

        // Model Routes...
        Route::resource('models', 'ModelController');

        // Service Routes...
        Route::resource('services', 'ServiceController');

        // Branch Routes...
        Route::resource('branches', 'BranchController');

        // Company Routes...
        Route::get('company', 'CompanyController@index')->name('company.index');
        Route::post('company/update', 'CompanyController@update')->name('company.update');

    });

    Route::group(['namespace' => 'Website', 'as' => 'website.'], function () {
        // Home Routes...
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/about-us', 'AboutUsController@index')->name('about');
        Route::get('/brand/{id}/models', 'BrandsController@index')->name('models');
        Route::get('/models/{id}', 'ModelsController@show')->name('models.show');
        Route::get('/services/{id}', 'ServicesController@show')->name('services.show');
        Route::get('/contact-us', 'ContactUsController@index')->name('contact');
    });

});

