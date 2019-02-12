<?php

Auth::routes();


Route::group(['prefix'=>'dashboard','middleware'=>'auth'], function(){
    Route::get('/', 'DashboardController@init')->name('dashboard.init');


    Route::get('profile', 'UsersController@profile')->name('dashboard.profile');
    Route::put('profile', 'UsersController@changePassword')->name('administrators.changepass');
    Route::resource('administrators', UsersController::class,['exception'=>['show']]);

    Route::resource('offers', OffersController::class,['exception'=>['show']]);

    Route::resource('newsletters', NewslettersController::class,['exception'=>['store','show']]);

    Route::resource('stores', StoresController::class,['exception'=>['show']]);
});

Route::get('show','Controller@test');
Route::post('result','Controller@exitCode');


Route::get('/','MarketplaceController@index')->name('app.init');

Route::get('/search','MarketplaceController@showFormSearch')->name('app.search');
Route::get('/found','MarketplaceController@search')->name('app.found');

Route::resource('offers', OffersController::class,['only'=>['show']]);

Route::resource('newsletters', NewslettersController::class,['only'=>['store']]);

