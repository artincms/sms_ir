<?php
Route::group(['namespace'=>'artincms\smsir\Controllers','middleware'=>config('smsir.middlewares')], function (){
	Route::get(config('smsir.route'),'SmsirController@index')->name('sms-admin');
	Route::get('sms-admin/{log}/delete','SmsirController@delete')->name('deleteLog');
});