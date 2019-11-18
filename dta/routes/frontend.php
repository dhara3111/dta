<?php


//
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {

    Route::get('/','HomeController@index')->name('home.index');

    /*------------------------- contact page start----------------------------*/
    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/create','ContactController@create')->name('contact.create');
    Route::post('contact/store','ContactController@store')->name('contact.store');
    /*------------------------- contact page start----------------------------*/

    /*------------------------- login page start----------------------------*/
    Route::get('login','LoginController@index')->name('login.index');
    Route::post('doLogin', 'LoginController@doLogin')->name('login.doLogin');
    Route::get('logout', 'LoginController@logout')->name('login.logout');
    /*------------------------- login page end----------------------------*/

    /*------------------------- forgetPassword page start----------------------------*/
    Route::get('forgetPassword', 'ForgetPasswordController@index')->name('forgetPassword.index');
    Route::post('send', 'ForgetPasswordController@send')->name('forgetPassword.send');
    /*------------------------- forgetPassword page start----------------------------*/

    /*------------------------- resetPassword page start----------------------------*/
    Route::get('reset/{key}/{id}', 'ResetPasswordController@index')->name('resetPassword.index');
    Route::get('resetPassword/{key}/{id}', 'ResetPasswordController@reset')->name('resetPassword.reset');
    /*------------------------- resetPassword page start----------------------------*/

    /*------------------------- register page start----------------------------*/
    Route::get('register','RegisterController@index')->name('register.index');
    Route::post('register/store','RegisterController@store')->name('register.store');
    /*------------------------- register page end----------------------------*/

    /*------------------------- forgot password page start----------------------------*/
    Route::get('forgotPassword','ForgotPasswordController@index')->name('forgotPassword.index');
    /*------------------------- forgot password page end----------------------------*/

    /*================================ helpline Route =====================================*/
    Route::get('helpline/Knowledge-Based', 'HelplineController@index')->name('helpline.index');

    /*================================ helpline Route =====================================*/


    Route::group(['middleware' => 'FrontAuth'], function () {

        /*=============================== change password route when login  start ===============================*/
        Route::get('change-password','ChangePasswordController@index')->name('changePassword.index');
        Route::post('change-password/update/{id}','ChangePasswordController@update')->name('changePassword.update');

        /*=============================== change password route when login  end ===============================*/

        /*=============================== user profile route when login  start ===============================*/
        Route::get('profile','ProfileController@index')->name('profile.index');
        Route::get('edit-profile/edit','ProfileController@edit')->name('profile.edit');
        Route::post('profile/update/{id}','ProfileController@update')->name('profile.update');

        /*=============================== user profile route when login  end ===============================*/

        /*=============================== assign lead route when login  start ===============================*/
        Route::get('lead-list','AssignLeadController@index')->name('assignLead.index');

        /*=============================== assign lead route when login  end ===============================*/

        /*=============================== purchase lead route when login  start ===============================*/
        Route::get('purchase-lead-list','PurchaseLeadController@index')->name('purchaseLead.index');

        /*=============================== purchase lead route when login  end ===============================*/

        /*================================ knowledge Route =====================================*/
        Route::get('knowledge-based', 'KnowledgeController@index')->name('knowledge.index');

        /*================================ knowledge Route =====================================*/

        //===================== Request Call Back ====================================
        Route::post('request-call/store', 'RequestCallController@store')->name('requestCall.store');

        //===================== END Request Call Back ================================

        //===================== Request Training  ====================================
        Route::post('request-training/store', 'RequestTrainingController@store')->name('requestTraining.store');

        //===================== END Request Training  ================================
        
    });

});

