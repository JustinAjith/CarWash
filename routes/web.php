<?php

Auth::routes();

Route::group(['namespace' => 'Web'], function ($routes) {
    $routes->get('/', 'HomeController@index')->name('web.home');
    $routes->get('/schedule', 'HomeController@schedule')->name('web.schedule');
    $routes->post('/schedule-table', 'HomeController@scheduleTable')->name('web.schedule.table');
    $routes->get('/booking-create', 'BookingController@index')->name('web.booking');
    $routes->post('/store', 'BookingController@store')->name('booking.store');
});

Route::group(['namespace' => 'Admin'], function ($routes) {
    $routes->get('/dashboard', 'HomeController@index')->name('admin.dashboard');

    $routes->get('/booking', 'BookingController@index')->name('admin.booking');
    $routes->post('/booking', 'BookingController@index')->name('admin.booking.table');
    $routes->get('/booking/{booking}', 'BookingController@show')->name('admin.booking.show');
    $routes->delete('/booking/{booking}', 'BookingController@delete')->name('admin.booking.delete');
    $routes->post('/booking/{booking}/{status}', 'BookingController@status')->name('admin.booking.change.status');

    $routes->get('/services', 'ServiceController@index')->name('admin.services');
    $routes->post('/services/store', 'ServiceController@store')->name('admin.services.store');
    $routes->post('/services/edit/{service}', 'ServiceController@edit')->name('admin.services.edit');
    $routes->delete('/services/delete/{service}', 'ServiceController@delete')->name('admin.services.delete');

    $routes->post('/sub_services/store', 'ServiceController@storeSubService')->name('admin.sub.services.store');
    $routes->post('/sub_services/edit', 'ServiceController@editSubService')->name('admin.sub.services.edit');
    $routes->delete('/sub_services/delete/{sub_service}', 'ServiceController@deleteSubService')->name('admin.sub.services.delete');


    $routes->get('/setting', 'SettingController@index')->name('admin.setting');
    $routes->post('/setting/change-password', 'SettingController@changePassword')->name('admin.change.password.submit');
});
