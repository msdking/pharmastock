<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_client'; // Define primary key column

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'address',
        'tel',
        'grade',
    ];

    // You can define relationships or other methods here
}
