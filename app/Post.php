<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable =['user_id','category_id','name','slug','excerpt','body','status','file'];

	// Cuando tiene una relacion de solo de uno
	public function user(){
    	return $this->belongsTo(User::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

	// Cuando tiene una relacion de muchos
    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }
}
