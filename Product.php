<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // If you need to specify the table name explicitly
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    // Specify any fillable fields if needed
    protected $fillable = [
        'id_product',
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
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function orderCount()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->count();
    }
    public function vents()
    {
        return $this->belongsToMany(Vent::class, 'vents', 'id_product', 'id');
    }
    public function ventss()
{
    return $this->hasMany(Vent::class, 'id_product');



}
}
