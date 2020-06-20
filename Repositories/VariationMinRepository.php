<?php

namespace Modules\VariationMin\Repositories;

use Modules\VariationMin\Entities\VariationMin;

class VariationMinRepository
{


	// CREATE
	public static function createBySku($sku, $data)
	{
		return VariationMin::create($data+['sku' => $sku]);
	}


	// LOADS
	public static function load()
	{
		return VariationMin::all();
	}

	public static function loadBySku($sku)
	{
		return VariationMin::where('sku', $sku)->get();
	}

	// UPDATE
	public static function update(VariationMin $variation_min, $data)
	{
		$variation_min->update($data);
		return $variation_min;
	}	


	// DELETE
	public static function destroy(VariationMin $variation_min)
	{
		$variation_min->delete();
	}

}
