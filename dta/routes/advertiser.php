<?php

Route::group(['namespace' => 'Advertiser', 'as' => 'advertiser.','prefix' => 'advertiser'], function () {

    Route::get('/', 'LoginController@index')->name('login.index');
    Route::post('login/sign', 'LoginController@sign')->name('login.sign');
    Route::post('logout', 'LoginController@logout')->name('login.logout');

    Route::get('signUp', 'SignUpController@index')->name('signUp.index');
    Route::post('signUp/store', 'SignUpController@store')->name('signUp.store');

    Route::get('forget', 'ForgetPasswordController@index')->name('forgetPassword.index');
    Route::post('forget/send', 'ForgetPasswordController@send')->name('forgetPassword.send');

    Route::get('reset/{key}/{id}', 'ResetPasswordController@index')->name('resetPassword.index');
    Route::get('resetPassword/{key}/{id}', 'ResetPasswordController@reset')->name('resetPassword.reset');


    Route::get('instruction/posting/{id}', 'InstructionController@posting')->name('instruction.posting');

    Route::group(['middleware' => 'AdvertiserAuth'], function () {

        Route::post('checkNotification', 'DashboardController@checkNotification')->name('dashboard.checkNotification');
        Route::get('admin/check', 'DashboardController@check')->name('dashboard.check');

        //===================== Dashboard User ==================================
        Route::get('dashboard/list', 'DashboardController@index')->name('dashboard.index');
        //===================== Dashboard User ==================================

        //===================== Change Password ====================================
        Route::get('changePassword/list', 'changePasswordController@index')->name('changePassword.index');
        Route::post('changePassword/edit/{id}', 'changePasswordController@edit')->name('changePassword.edit');
        //===================== END Change Password  ====================================

        //===================== Begin Notification ====================================
        Route::post('notification/unRead', 'NotificationController@unRead')->name('notification.unRead');
        //===================== END Notification ================================

    });

});

//Route::group(['namespace' => 'Advertiser', 'as' => 'advertiser.'], function () {
//
//    Route::get('advertiser', 'LoginController@index')->name('login.index');
//    Route::post('advertiser/login/sign', 'LoginController@sign')->name('login.sign');
//    Route::post('advertiser/logout', 'LoginController@logout')->name('login.logout');
//    Route::post('advertiser/sign-up', 'SignupController@sign-up')->name('sign-up.index');
//
//    Route::get('advertiser/forget', 'ForgetPasswordController@index')->name('forgetPassword.index');
//    Route::post('advertiser/forget/send', 'ForgetPasswordController@send')->name('forgetPassword.send');
//
//    Route::get('advertiser/reset/{key}/{id}', 'ResetPasswordController@index')->name('resetPassword.index');
//    Route::get('advertiser/resetPassword/{key}/{id}', 'ResetPasswordController@reset')->name('resetPassword.reset');
//
//
//    Route::get('advertiser/instruction/posting/{id}', 'InstructionController@posting')->name('instruction.posting');
//
//    Route::group(['middleware' => 'AdvertiserAuth'], function () {
//
//        Route::post('advertiser/checkNotification', 'DashboardController@checkNotification')->name('dashboard.checkNotification');
//        Route::get('admin/check', 'DashboardController@check')->name('dashboard.check');
//
//        //===================== Dashboard User ==================================
//        Route::get('advertiser/dashboard/list', 'DashboardController@index')->name('dashboard.index');
//        //===================== Dashboard User ==================================
//
//        //===================== Change Password ====================================
//        Route::get('advertiser/changePassword/list', 'changePasswordController@index')->name('changePassword.index');
//        Route::post('advertiser/advertiser/changePassword/edit/{id}', 'changePasswordController@edit')->name('changePassword.edit');
//        //===================== END Change Password  ====================================
//
//        //===================== Begin Notification ====================================
//        Route::post('advertiser/advertiser/notification/unRead', 'NotificationController@unRead')->name('notification.unRead');
//        //===================== END Notification ================================
//
//    });
//
//});


