<?php

namespace Modules\VariationMin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\VariationMin\Http\ViewComposers\Loader\Products\EditComposer;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('variationmin::loader.products.edit', EditComposer::class);
	}

	public function register() {
        //
	}

}
