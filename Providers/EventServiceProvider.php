<?php

namespace Modules\VariationMin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

use Modules\Product\Events\ProductsLazyEagerLoadingEvent;
use Modules\VariationMin\Listeners\ProductsLazyEagerLoadingListener;


use Modules\Order\Events\UpdateManyItemsBeginEvent;
use Modules\VariationMin\Listeners\CheckItemsValidationMinListener;

use Modules\Product\Events\ProductLazyEagerLoadingEvent;

class EventServiceProvider extends ServiceProvider 
{

	public function boot() 
	{

	}

	public function register() 
	{
		Event::listen(ProductsLazyEagerLoadingEvent::class, ProductsLazyEagerLoadingListener::class);
		Event::listen(UpdateManyItemsBeginEvent::class, CheckItemsValidationMinListener::class);

		Event::listen(ProductLazyEagerLoadingEvent::class, ProductsLazyEagerLoadingListener::class);
	}

}
