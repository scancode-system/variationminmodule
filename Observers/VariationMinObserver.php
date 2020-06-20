<?php

namespace Modules\VariationMin\Observers;

use Modules\VariationMin\Entities\VariationMin;

class VariationMinObserver
{

	public function created(VariationMin $variation_min) 
	{
		if(is_null($variation_min->group)){
			$variation_min->group = $variation_min->id;
			 $variation_min->save();
		}
	}	

}
