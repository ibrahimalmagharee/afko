<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

    Route::group(['namespace' => 'Dashboard', 'prefix' => 'admin'], function (){

        Route::get('index','DashboardController@index')->name('admin.dashboard');
        Route::get('logout','LoginController@logout')->name('admin.logout');


        ######################### Profile Routes #############################################################

        Route::group(['prefix' => 'profile'], function (){
            Route::get('edit', 'ProfileController@edit')->name('edit.profile');
            Route::put('update', 'ProfileController@update')->name('update.profile');
        });

        ######################### End Profile Routes #############################################################

        ######################### Order Routes #############################################################

        Route::group(['prefix' => 'orders'], function (){
            Route::get('orders', 'OrderController@orders')->name('orders');
            Route::post('view-order', 'OrderController@viewOrder')->name('viewOrder');
            Route::post('change-status', 'OrderController@changeStatus')->name('changeStatus');
        });

        ######################### End Order Routes #############################################################


        ##################  Background Routes #############################################################

        Route::group(['prefix' => 'background'], function (){
            Route::get('/show', 'BackgroundController@index')->name('index.background');
            Route::post('save', 'BackgroundController@store')->name('save.background');
            Route::get('edit/{id}', 'BackgroundController@edit')->name('edit.background');
            Route::post('update/{id}', 'BackgroundController@update')->name('update.background');
            Route::get('delete/{id}', 'BackgroundController@destroy')->name('delete.background');

        });
        ######################### End Background Routes #############################################################

        ##################  Logo Routes #############################################################

        Route::group(['prefix' => 'logo'], function (){
            Route::get('/show', 'LogoController@index')->name('index.logo');
            Route::post('save', 'LogoController@store')->name('save.logo');
            Route::get('edit/{id}', 'LogoController@edit')->name('edit.logo');
            Route::post('update/{id}', 'LogoController@update')->name('update.logo');
            Route::get('delete/{id}', 'LogoController@destroy')->name('delete.logo');

        });
        ######################### End Logo Routes #############################################################

        ##################  ContactInformation Routes #############################################################

        Route::group(['prefix' => 'contact-information'], function (){
            Route::get('/show', 'ContactInformationController@index')->name('index.contact_information');
            Route::post('save', 'ContactInformationController@store')->name('save.contact_information');
            Route::get('edit/{id}', 'ContactInformationController@edit')->name('edit.contact_information');
            Route::post('update/{id}', 'ContactInformationController@update')->name('update.contact_information');
            Route::get('delete/{id}', 'ContactInformationController@destroy')->name('delete.contact_information');

        });
        ######################### End ContactInformation Routes #############################################################


    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function(){
        Route::get('/login','LoginController@login')->name('admin.login.page');
        Route::post('/check-login','LoginController@checkLogin')->name('check.admin.login');
    });



