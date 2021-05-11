<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    public function category($id)
    {
        return $this->builder->where('category_id', $id);
    }

    public function search($keyword)
    {
        return $this->builder->where('name', 'like', '%'.$keyword.'%');
    }
}
