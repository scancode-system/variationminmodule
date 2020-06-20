<?php

namespace Modules\VariationMin\Http\ViewComposers\Loader\Products;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Variation\Repositories\VariationRepository;
use Modules\VariationMin\Repositories\VariationMinRepository;

class EditComposer extends ServiceComposer {

    private $variation_mins;

    private $groups;
    private $variations;
    private $values_variations;

    public function assign($view){
        $this->variation_mins();
        $this->groups();
        $this->variations();
        $this->values_variations();
    }

    private function variation_mins(){
        $variation_mins = VariationMinRepository::loadBySku($this->view->product->sku);
        $this->variation_mins = $variation_mins->groupBy(function($variation_min, $key){
            return $variation_min->group;
        });
    }


    private function groups(){
        $groups = collect([]);
        foreach ($this->variation_mins->keys() as $group) {
            $groups->put($group, '#'.$group);
        }
        $this->groups = $groups;
    }


    private function variations(){
        $this->variations = VariationRepository::load();
    }

    private function values_variations(){
        $values_variations = collect([]);

        foreach ($this->variations as $variation) {
            $repositoryClass = 'Modules'.'\\'.ucfirst($variation->table).'\\Repositories\\'.ucfirst($variation->table).'Repository';
            $repository = new $repositoryClass();
            $values_variations->push((object)['id' => $variation->alias, 'values' => $repository::load()->pluck($variation->field, $variation->field)]);
        }

        $this->values_variations = $values_variations;
    }

    public function view($view){
        $view->with('variation_mins', $this->variation_mins);

        $view->with('groups', $this->groups);
        $view->with('variations', $this->variations);
        $view->with('values_variations', $this->values_variations);
    }

}