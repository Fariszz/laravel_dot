<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id'
    ];

    protected $visible = [
        'name',
        'description',
        'Category'
    ];

    public function excerpt(){
        return substr($this->description, 0, 100);
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function GetById($id): Product
    {
        return Product::with('Category')->where('id', $id)->first();
    }
}
