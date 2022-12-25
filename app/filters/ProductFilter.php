<?php

namespace App\Filters;

class ProductFilter extends QueryFilter{
    public function category_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }

    public function search_by_name($search_string = ''){
        return $this->builder
            ->where('name', 'LIKE', '%'.$search_string.'%');
    }
    public function min_price($minprice = null){
        return $this->builder->where('price','>',$minprice);
    }
    public function max_price($maxprice ){
        return $this->builder->where('price','<',$maxprice);
    }
}
