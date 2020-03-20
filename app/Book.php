<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //aml 
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function leasedBy()
    {
        return $this->BelongsToMany(User::class, 'book_lease');
    }

    public function getRates()
    {
        $totalRate = 0;
        $ratesCount = count($this->comments);
        if ($ratesCount > 0) {
            foreach ($this->comments as $comment) {
                $totalRate += $comment['rate'];
            }

            return floor($totalRate / $ratesCount);
        } else
            return 0;
    }
}
