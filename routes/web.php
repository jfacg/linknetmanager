<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Admin')
    ->prefix('admin')
    ->middleware('auth')
    ->group(function(){

        /**
        * Routes Profiles Users
        */
        Route::get('users/{id}/profiles', 'ACL\ProfileUserController@profiles')->name('users.profiles');
        Route::any('users/{id}/profiles/create', 'ACL\ProfileUserController@profilesAvailable')->name('users.profiles.available');
        Route::post('users/{id}/profiles', 'ACL\ProfileUserController@attachProfilesUser')->name('users.profiles.attach');
        Route::get('users/{id}/profile/{idProfile}/detach', 'ACL\ProfileUserController@detachProfilesUser')->name('users.profiles.detach');
        

        /**
        * Routes Permissions Profiles
        */
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        // Route::get('permissions/{id}/profiles', 'ACL\ProfilePermissionController@profiles')->name('permissions.profiles');


        /**
         * Permissions
         */
        Route::resource('permissions', 'PermissionController');
        Route::any('permissions/search', 'PermissionController@search')->name('permissions.search');

        /**
         * Profiles
         */
        Route::resource('profiles', 'ProfileController');
        Route::any('profiles/search', 'ProfileController@search')->name('profiles.search');

        /**
         * Users
         */
        Route::resource('users', 'UserController');
        Route::any('users/search', 'UserController@search')->name('users.search');

        /**
         * Dashboard
         */
        Route::get('/', 'DashboardController@index')->name('dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
