<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product; // Ensure the Product model exists in this namespace

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];

    public function products()
    {
        // Specify the foreign key as 'category' instead of the default 'category_id'
        return $this->hasMany(Product::class, 'category', 'id');
    }
}