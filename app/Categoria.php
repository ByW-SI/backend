<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=[
    	'name',
    	'slug'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    public function posts()
    {
    	return $this->belongsToMany('App\Post', 'categoria_posts', 'categoria_id', 'post_id');
    }
}
