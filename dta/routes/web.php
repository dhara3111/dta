<?php

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('admin', 'LoginController@index')->name('login.index');
    Route::post('login/signIn', 'LoginController@signIn')->name('login.signIn');
    Route::post('logout', 'LoginController@logout')->name('login.logout');

    Route::get('forget', 'ForgetPasswordController@index')->name('forgetPassword.index');
    Route::post('forget/send', 'ForgetPasswordController@send')->name('forgetPassword.send');

    Route::get('reset/{key}/{id}/{userId}/{module}', 'ResetPasswordController@index')->name('resetPassword.index');
    Route::get('resetPassword/{key}/{id}/{userId}/{module}', 'ResetPasswordController@reset')->name('resetPassword.reset');


    Route::get('instruction/posting/{id}', 'InstructionController@posting')->name('instruction.posting');

    Route::group(['middleware' => 'AdminAuth'], function () {

        Route::post('admin/checkNotification', 'DashboardController@checkNotification')->name('dashboard.checkNotification');
        Route::get('admin/check', 'DashboardController@check')->name('dashboard.check');

        //===================== Dashboard User ==================================
        Route::get('dashboard/list', 'DashboardController@index')->name('dashboard.index');
        //===================== Dashboard User ==================================

        //===================== Lead ====================================
        Route::get('lead/list/{userId}/{module}', 'LeadController@index')->name('lead.index');
        Route::post('lead/get-attorney', 'LeadController@getAttorney')->name('lead.getAttorney');
        Route::get('lead/create', 'LeadController@create')->name('lead.create');
        Route::post('lead/store', 'LeadController@store')->name('lead.store');
        Route::get('lead/edit/{id}', 'LeadController@edit')->name('lead.edit');
        Route::post('lead/update/{id}', 'LeadController@update')->name('lead.update');
        Route::post('lead/delete', 'LeadController@delete')->name('lead.delete');
        Route::post('lead/change-status', 'LeadController@changeStatus')->name('lead.changeStatus');
        Route::post('lead/send-mail', 'LeadController@sendMail')->name('lead.sendMail');
        Route::get('lead/send-mail', 'LeadController@sendMail')->name('lead.sendMail');
        //===================== END Lead ================================

        //===================== Attorney ====================================
        Route::get('attorney/list/{userId}/{module}', 'AttorneyController@index')->name('attorney.index');
        Route::get('attorney/edit/{id}', 'AttorneyController@edit')->name('attorney.edit');
        Route::post('attorney/update/{id}', 'AttorneyController@update')->name('attorney.update');
        Route::post('attorney/delete/{userId}/{module}', 'AttorneyController@delete')->name('attorney.delete');
        Route::post('attorney/changeStatus/{userId}/{module}', 'AttorneyController@changeStatus')->name('attorney.changeStatus');
        Route::get('attorney/import/{userId}/{module}', 'AttorneyController@import')->name('attorney.import');
        Route::post('attorney/importExcel/{userId}/{module}', 'AttorneyController@importExcel')->name('attorney.importExcel');
        //===================== END Attorney ================================

        //===================== Service ====================================
        Route::get('service/list/{userId}/{module}', 'ServiceController@index')->name('service.index');
        Route::get('service/create/{userId}/{module}', 'ServiceController@create')->name('service.create');
        Route::post('service/store/{userId}/{module}', 'ServiceController@store')->name('service.store');
        Route::get('service/edit/{id}/{userId}/{module}', 'ServiceController@edit')->name('service.edit');
        Route::post('service/update/{id}/{userId}/{module}', 'ServiceController@update')->name('service.update');
        Route::post('service/delete', 'ServiceController@delete')->name('service.delete');
        Route::post('service/changeStatus', 'ServiceController@changeStatus')->name('service.changeStatus');

        //===================== END Service ================================

        //===================== Legal Campaigns ====================================
        Route::get('type/list/{id}/{module}', 'TypeController@index')->name('type.index');

        Route::get('type/create/{userId}/{module}', 'TypeController@create')->name('type.create');
        Route::post('type/store/{userId}/{module}', 'TypeController@store')->name('type.store');
        Route::get('type/edit/{id}/{userId}/{module}', 'TypeController@edit')->name('type.edit');
        Route::post('type/update/{id}/{userId}/{module}', 'TypeController@update')->name('type.update');
        Route::post('type/delete/{userId}/{module}', 'TypeController@delete')->name('type.delete');
        Route::post('type/changeStatus/{userId}/{module}', 'TypeController@changeStatus')->name('type.changeStatus');
        //===================== END Legal Campaigns ================================

        //===================== General Posting Instruction ====================================
        Route::get('posting-instruction/list/{userId}/{module}', 'PostingInstructionController@index')->name('postingInstruction.index');
        Route::post('posting-instruction/campaign-key', 'PostingInstructionController@campaignKey')->name('postingInstruction.campaignKey');
        Route::get('posting-instruction/posting/{id}', 'PostingInstructionController@posting')->name('postingInstruction.posting');
        Route::post('posting-instruction/postingMail/{userId}/{module}', 'PostingInstructionController@postingMail')->name('postingInstruction.postingMail');
        //===================== END General Posting Instruction ================================

        //===================== Request Call Back ====================================
        Route::get('requestCall/panding-list/{userId}/{module}', 'RequestCallController@index')->name('requestCall.index');
        Route::get('requestCall/approve-list/{userId}/{module}', 'RequestCallController@approve')->name('requestCall.approve');
        Route::post('requestCall/changeStatus', 'RequestCallController@changeStatus')->name('requestCall.changeStatus');
        //===================== END Request Call Back ================================

        //===================== Request Training  ====================================
        Route::get('requestTraining/panding-list/{userId}/{module}', 'RequestTrainingController@index')->name('requestTraining.index');
        Route::get('requestTraining/approve-list/{userId}/{module}', 'RequestTrainingController@approve')->name('requestTraining.approve');
        Route::post('requestTraining/changeStatus', 'RequestTrainingController@changeStatus')->name('requestTraining.changeStatus');
        //===================== END Request Training ================================

        //===================== Knowledge ====================================
        Route::get('knowledge/list/{userId}/{module}', 'KnowledgeController@index')->name('knowledge.index');

        Route::get('knowledge/create/{userId}/{module}', 'KnowledgeController@create')->name('knowledge.create');
        Route::post('knowledge/store/{userId}/{module}', 'KnowledgeController@store')->name('knowledge.store');
        Route::get('knowledge/edit/{id}/{userId}/{module}', 'KnowledgeController@edit')->name('knowledge.edit');
        Route::post('knowledge/update/{id}/{userId}/{module}', 'KnowledgeController@update')->name('knowledge.update');
        Route::post('knowledge/delete', 'KnowledgeController@delete')->name('knowledge.delete');
        //===================== END Knowledge ====================================

        //===================== Testimonial ====================================
        Route::get('testimonial/list/{userId}/{module}', 'TestimonialController@index')->name('testimonial.index');

        Route::get('testimonial/create/{userId}/{module}', 'TestimonialController@create')->name('testimonial.create');
        Route::post('testimonial/store/{userId}/{module}', 'TestimonialController@store')->name('testimonial.store');
        Route::get('testimonial/edit/{id}/{userId}/{module}', 'TestimonialController@edit')->name('testimonial.edit');
        Route::post('testimonial/update/{id}/{userId}/{module}', 'TestimonialController@update')->name('testimonial.update');
        Route::post('testimonial/delete', 'TestimonialController@delete')->name('testimonial.delete');
        //===================== END Testimonial ================================

        //===================== Our Detail ====================================
        Route::get('ourDetail/list/{id}/{module}', 'OurDetailController@index')->name('ourDetail.index');

        Route::get('ourDetail/create/{userId}/{module}', 'OurDetailController@create')->name('ourDetail.create');
        Route::post('ourDetail/store/{userId}/{module}', 'OurDetailController@store')->name('ourDetail.store');
        Route::get('ourDetail/edit/{id}/{userId}/{module}', 'OurDetailController@edit')->name('ourDetail.edit');
        Route::post('ourDetail/update/{id}/{userId}/{module}', 'OurDetailController@update')->name('ourDetail.update');
        Route::post('ourDetail/delete/{userId}/{module}', 'OurDetailController@delete')->name('ourDetail.delete');
        Route::post('ourDetail/changeStatus/{userId}/{module}', 'OurDetailController@changeStatus')->name('ourDetail.changeStatus');
        //===================== END Our Detail ================================

        //===================== Begin Admin User ==================================
        Route::get('adminUser/list/{userId}/{module}', 'AdminUserController@index')->name('adminUser.index');

        Route::get('adminUser/create/{userId}/{module}', 'AdminUserController@create')->name('adminUser.create');
        Route::post('adminUser/store/{userId}/{module}', 'AdminUserController@store')->name('adminUser.store');
        Route::post('adminUser/getDetails', 'AdminUserController@getDetails')->name('adminUser.getDetails');
        Route::get('adminUser/edit/{id}/{userId}/{module}', 'AdminUserController@edit')->name('adminUser.edit');
        Route::post('adminUser/update/{id}/{userId}/{module}', 'AdminUserController@update')->name('adminUser.update');
        Route::post('adminUser/changeStatus/{userId}/{module}', 'AdminUserController@changeStatus')->name('adminUser.changeStatus');
        Route::post('adminUser/delete/{userId}/{module}', 'AdminUserController@delete')->name('adminUser.delete');
        Route::post('adminUser/changePassword', 'AdminUserController@changePassword')->name('adminUser.changePassword');
        //===================== END Admin User ===============================

        //===================== Change Password ====================================
        Route::get('changePassword/list', 'changePasswordController@index')->name('changePassword.index');
        Route::post('changePassword/edit/{id}', 'changePasswordController@edit')->name('changePassword.edit');
        //===================== END Change Password  ====================================

        //===================== Module ==================================
        Route::get('module/list', 'ModuleController@index')->name('module.index');

        Route::get('module/create', 'ModuleController@create')->name('module.create');
        Route::post('module/store', 'ModuleController@store')->name('module.store');
        Route::post('module/getDetails', 'ModuleController@getDetails')->name('module.getDetails');
        Route::get('module/edit/{id}', 'ModuleController@edit')->name('module.edit');
        Route::post('module/update/{id}', 'ModuleController@update')->name('module.update');
        Route::post('module/changeStatus', 'ModuleController@changeStatus')->name('module.changeStatus');
        Route::post('module/delete', 'ModuleController@delete')->name('module.delete');
        //===================== END Module  ===============================

        //===================== Begin Notification ====================================
        Route::post('notification/unRead', 'NotificationController@unRead')->name('notification.unRead');
        //===================== END Notification ================================

    });

});

