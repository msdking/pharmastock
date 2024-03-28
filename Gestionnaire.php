<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Gestionnaire extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    public $timestamps = false;

    protected $table = 'gestionnaire';
    protected $fillable = ['id','email', 'password','nom','prenom'];
}


