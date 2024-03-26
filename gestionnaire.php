<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gestionnaire extends Model
{
    protected $table = 'gestionnaire';
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'tel', 'address', 'photo', 'civilite'];
}
