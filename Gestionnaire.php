<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class Gestionnaire extends Model implements Authenticatable
{
    use HasFactory,AuthenticableTrait,Notifiable;
    protected $guard = 'gestionnaires';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'tel',
        'address',
        'photo',
        'civilite',
        'type',
    ];
}
