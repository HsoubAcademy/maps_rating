<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Slug;

class Place extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'view_count']; 

    public function getImageAttribute($image) {

        return asset('storage/images/'.$image);
        
    }

    public function scopeSearch($query, $request)
    {
        if($request->category) {
            $query->whereCategory_id($request->category);
        }

        if($request->address){
            $query->where('address', 'LIKE', '%'.$request->address.'%');
        }

        return $query;
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = SLug::uniqueSlug($value, 'places');
    }

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Bookmark', 'bookmarks');
    }

}
