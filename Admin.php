<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use Notifiable;

    protected $guarded = 'admin';

    public $timestamps = false;

    protected $table = 'admin';
    protected $fillable = ['id','nom','prenom','email','password','tel','address','photo','civilite'];
}
