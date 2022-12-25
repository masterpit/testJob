<?php

namespace App\Models;

use App\Filters\QueryFilter;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Product extends Model
{
    use HasFactory;
    protected $table = 'Products';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'weight',
        'price',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function scopeFilters(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
