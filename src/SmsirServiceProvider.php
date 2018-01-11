<?php

namespace artincms\sms_ir;

use Illuminate\Support\ServiceProvider;

class SmsirServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
    	// the main router
	    include_once __DIR__.'/routes.php';
	    // the main views folder
	    $this->loadViewsFrom(__DIR__.'/views', 'sms_ir');
	    // the main migration folder for create sms_ir tables

	    // for publish the views into main app
	    $this->publishes([
		    __DIR__.'/views' => resource_path('views/vendor/sms_ir'),
	    ]);

	    $this->publishes([
		    __DIR__.'/migrations/' => database_path('migrations')
	    ], 'migrations');

	    // for publish the assets files into main app
	    $this->publishes([
		    __DIR__.'/assets' => public_path('vendor/sms_ir'),
	    ], 'public');

	    // for publish the sms_ir config file to the main app config folder
	    $this->publishes([
		    __DIR__.'/config/sms_ir.php' => config_path('sms_ir.php'),
	    ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	// set the main config file
	    $this->mergeConfigFrom(
		    __DIR__.'/config/sms_ir.php', 'sms_ir'
	    );

		// bind the SmsIR Facade
	    $this->app->bind('SmsIR', function () {
		    return new SmsIR;
	    });
    }
}
