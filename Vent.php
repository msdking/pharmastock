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

    // You can define relationships or other methods here
}
