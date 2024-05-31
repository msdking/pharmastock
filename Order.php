<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_client',
        'price',
        'status',
    ];

    // Define the relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    // In the Order model
public function client()
{
    return $this->belongsTo(Client::class, 'client_id');
}
public function vents()
    {
        return $this->hasMany(Vent::class, 'id_order');
    }
    public function gestionnaire()
    {
        return $this->belongsTo(Gestionnaire::class, 'gestionnaire_id');
    }
}
