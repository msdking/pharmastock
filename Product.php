<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // If you need to specify the table name explicitly
    protected $table = 'products';

    // Specify any fillable fields if needed
    protected $fillable = [
        'id_category',
        'nom',
        'description',
        'prix_u',
        'quantite',
        'date_expiration',
        'photo',
    ];

    // If you have any relationships with other models, define them here
    // For example, if a product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
