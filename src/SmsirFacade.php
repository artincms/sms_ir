<?php
namespace artincms\sms_ir;
use Illuminate\Support\Facades\Facade;

class SmsirFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return 'SmsIR';
	}
}