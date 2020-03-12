<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    protected $fillable = ['name'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
//Not tested yet
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}