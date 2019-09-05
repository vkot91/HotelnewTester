<?php
Route::get('/', function () {
    return view('welcome');
});
Route::post('/',function()
{

});

// Authentication Routes...
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::resource('categories', 'Admin\CategoryController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoryController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoryController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoryController@perma_del', 'as' => 'categories.perma_del']);

    Route::resource('rooms', 'Admin\RoomsController');
    Route::post('rooms_mass_destroy', ['uses' => 'Admin\RoomsController@massDestroy', 'as' => 'rooms.mass_destroy']);
    Route::post('rooms_restore/{id}', ['uses' => 'Admin\RoomsController@restore', 'as' => 'rooms.restore']);
    Route::delete('rooms_perma_del/{id}', ['uses' => 'Admin\RoomsController@perma_del', 'as' => 'rooms.perma_del']);
    Route::resource('bookings', 'Admin\BookingsController', ['except' => 'bookings.create']);
     Route::get('bookings/create/', ['as' => 'bookings.create', 'uses' => 'Admin\BookingsController@create']);
    Route::post('bookings_mass_destroy', ['uses' => 'Admin\BookingsController@massDestroy', 'as' => 'bookings.mass_destroy']);
    Route::post('bookings_restore/{id}', ['uses' => 'Admin\BookingsController@restore', 'as' => 'bookings.restore']);
    Route::delete('bookings_perma_del/{id}', ['uses' => 'Admin\BookingsController@perma_del', 'as' => 'bookings.perma_del']);
    //Route::resource('/find_rooms', 'Admin\FindRoomsController', ['except' => 'create']);
    Route::get('/find_rooms', 'Admin\FindRoomsController@index')->name('find_rooms.index');
    Route::post('/find_rooms', 'Admin\FindRoomsController@index');
    /*Route::get('/bookings/create/', [
        'as' => 'find_rooms.create',
        'uses' => 'Admin\BookingsController@create'
    ]);*/
});
Route::get('events', function () {
    return view('events');
});
Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('rooms', function () {
    return view('rooms');
});
Route::get('singleroom', function () {
    return view('singleroom');
});
Route::get('familyroom', function () {
    return view('familyroom');
});
Route::get('standardroom', function () {
    return view('standardroom');
});
Route::get('stdroomreserv', function () {
    return view('stdroomreserv');
});


Route::get('sngroomreserv', function () {
    return view('sngroomreserv');
});
Route::get('fmlroomreserv', function () {
    return view('fmlroomreserv');
});

Route::get('adminrooms', function () {
    return view('adminrooms');
});


Route::get('adminpark', function () {
    return view('adminpark');
});


Route::get('adminusers', function () {
    return view('adminusers');
});
Route::get('adminstaff', function () {
    return view('adminstaff');
});
