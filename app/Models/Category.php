<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $visible = [
        'id',
        'name',
    ];

    public function Product(){
        return $this->hasMany(Product::class);
    }


}
