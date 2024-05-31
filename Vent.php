<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'quantite',
        'id_client',
        'date',
        'type',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function gestionnaire()
    {
        return $this->belongsTo(Gestionnaire::class, 'gestionnaire_id');
    }
    // You can define relationships or other methods here
}
