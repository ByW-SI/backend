<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable= [
    	'title',
    	'subtitle',
    	'status',
    	'slug',
    	'body',
    	'image_path',
    	'like',
    	'dislike'
    ];

    /**
     * The roles that belong to the user.
     */
    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'categoria_posts', 'post_id', 'categoria_id');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id');
    }
}
