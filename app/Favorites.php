<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    //
    protected $fillable = ['user_id','book_id'];
    protected $table = "book_favorites";
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
}
