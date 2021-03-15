<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function avgRating()
    {
        return ($this->service_rating + $this->cleanliness_rating + $this->quality_rating + $this->pricing_rating) / 4;
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User','likes');
    }

}
