<?php
Route::group(['namespace'=>'artincms\sms_ir\Controllers','middleware'=>config('sms_ir.middlewares')], function (){
	Route::get(config('sms_ir.route'),'SmsirController@index')->name('sms-admin');
	Route::get('sms-admin/{log}/delete','SmsirController@delete')->name('deleteLog');
});