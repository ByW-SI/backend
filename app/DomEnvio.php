<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class DomEnvio extends Model
{
    //
    use HasApiTokens, Notifiable, softDeletes;

    protected $table = "domicilio_envio";

    protected $fillable = [

    	"id",
    	"user_id",
    	"pais",
    	"estado",
    	"municipio",
    	"ciudad",
    	"colonia",
    	"calle",
    	"numext",
    	"numint",
    	"entre1",
    	"entre2",
    	"referencia"

    ];

    protected $hidden=[

    	"created_at",
    	"updated_at",
    	"deleted_at"
    ];

    public function user(){

    	return $this->belongsTo('App\User', 'user_id');

    }
    public function shoppingCarts(){
        return $this->hasMany('App\ShoppingCart','envio_id','id');
    }

}
