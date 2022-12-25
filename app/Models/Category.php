<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    protected $fillable = ['title','parent_id'];
    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
