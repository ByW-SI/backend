<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Tarjetas extends Model
{
    //
    use HasApiTokens, Notifiable;

    protected $table = "tarjetas";

    protected $fillable = [

    	"id",
    	"user_id",
    	"tipo",
    	"numero",
    	"nombre",
    	"pais",
    	"calle",
    	"numext",
    	"numint",
    	"colonia",
    	"cp",
    	"estado",
    	"municipio",
    	"delegacion",
    	"verifica",
    	"expira",

    ];

    protected $hidden = [

    	"created_at",
    	"updated_at",
    	"deleted_at"

    ];

    public function user(){

    	return $this->belongsTo('App\User','user_id');
    	
    }

}
