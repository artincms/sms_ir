<?php

namespace artincms\sms_ir\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use artincms\sms_ir\SmsIR;
use artincms\sms_ir\SmsirLogs;


class SmsirController extends Controller
{

	// the main index page for administrators
	public function index() {
		$credit = SmsIR::credit();
		$smsir_logs = SmsirLogs::orderBy('id','DESC')->paginate(config('sms_ir.in-page'));
		return view('sms_ir::index',compact('credit','smsir_logs'));
	}

	// administrators can delete single log
	public function delete() {
		SmsirLogs::where('id',Route::current()->parameters['log'])->delete();
		// return the user back to sms-admin after delete the log
		return back();
	}
}