<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Punto extends Model
{
    //
    protected $table='puntos';

    protected $fillable=[
    	'user_id',
    	'expira',
    	'codigo',
    	'puntos',
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function user(){
    	return $this->belongsTo('App\User');

    }
    public function users(){
    	return $this->belongsToMany('App\User', 'punto_user','punto_id','user_id')->withPivot('usado');
    }

    public function isExpired(){
        return $this->expira ? Carbon::now()->gte($this->expira) : false;

    }

    public function getUsedByAttribute()
    {
        return $this->users()->count();
    }
}
