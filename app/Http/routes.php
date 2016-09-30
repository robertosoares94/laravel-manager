<?php
// Site
Route::group(['namespace' => 'Site'], function(){
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
});

Route::auth();
// Painel (ADMIN)
Route::group(['prefix' => 'admin','middleware' => ['auth'], 'namespace' => 'Admin','as'=>'admin.'], function(){
    /*
    * Dashboard
    */
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    /*
    * Perfil
    */
    Route::get('/profile', ['as' => 'profile', 'uses' => 'ProfileController@index']);
    Route::post('/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    /*
     * Usuários Routes
     */
    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/', ['as' => 'usuarios', 'uses' => 'UsuariosController@index','middleware' => ['permission:usuario-create|usuario-list|usuario-edit|usuario-delete']]);
        Route::get('create', ['as' => 'usuarios.create', 'uses' => 'UsuariosController@create','middleware' => ['permission:usuario-create']]);
        Route::post('store', ['as' => 'usuarios.store', 'uses' => 'UsuariosController@store','middleware' => ['permission:usuario-create']]);
        Route::get('edit/{id}', ['as' => 'usuarios.edit', 'uses' => 'UsuariosController@edit','middleware' => ['permission:usuario-edit']]);
        Route::put('update/{id}', ['as' => 'usuarios.update', 'uses' => 'UsuariosController@update','middleware' => ['permission:usuario-edit']]);
        Route::delete('delete/{id}', ['as' => 'usuarios.destroy', 'uses' => 'UsuariosController@destroy','middleware' => ['permission:usuario-delete']]);
    });
    /*
     * Roles Routes
     */
    Route::group(['prefix' => 'roles'], function(){
        Route::get('/',['as'=>'roles','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
        Route::post('create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
        Route::get('edit/{id}',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
        Route::put('update/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
        Route::delete('delete/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
    });
    /*
   * Banner Routes
   */
    Route::group(['prefix' => 'banners'], function(){
        Route::get('/',['as'=>'banners','uses'=>'BannerController@index','middleware' => ['permission:banner-list|banner-create|banner-edit|banner-delete']]);
        Route::get('create',['as'=>'banners.create','uses'=>'BannerController@create','middleware' => ['permission:banner-create']]);
        Route::post('create',['as'=>'banners.store','uses'=>'BannerController@store','middleware' => ['permission:banner-create']]);
        Route::get('edit/{id}',['as'=>'banners.edit','uses'=>'BannerController@edit','middleware' => ['permission:banner-edit']]);
        Route::put('update/{id}',['as'=>'banners.update','uses'=>'BannerController@update','middleware' => ['permission:banner-edit']]);
        Route::delete('delete/{id}',['as'=>'banners.destroy','uses'=>'BannerController@destroy','middleware' => ['permission:banner-delete']]);
    });
});


