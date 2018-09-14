<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'appaterno', 'apmaterno', 'nacimiento', 'numero_telefono', 'email', 'password'
    ];
    protected $visible = [
        'name', 'appaterno', 'apmaterno', 'nacimiento', 'numero_telefono', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','password', 'remember_token','created_at','updated_at'
    ];

    public function domFiscal(){

        return $this->hasOne('App\DomFiscal', 'user_id', 'id');

    }

    public function domEnvio(){

        return $this->hasMany('App\DomEnvio', 'user_id', 'id');

    }

    public function tarjetas(){

        return $this->hasMany('App\Tarjetas', 'user_id', 'id');

    }

    public function miCupones(){
        return $this->hasMany('App\Punto','user_id','id');
    }

    public function cupones()
    {
        return $this->belongsToMany('App\Punto', 'punto_user','user_id','punto_id')->withPivot('usado');
    }

    public function shoppingCarts(){
        return $this->hasMany('App\ShoppingCart','user_id','id');
    }


}
