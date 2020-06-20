<?php

namespace Modules\VariationMin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\VariationMin\Entities\VariationMin;
use Modules\VariationMin\Observers\VariationMinObserver;
use Modules\Order\Entities\Order;
use Modules\VariationMin\Observers\OrderObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		VariationMin::observe(VariationMinObserver::class);
		Order::observe(OrderObserver::class);
	}

	public function register() {
        //
	}

}
