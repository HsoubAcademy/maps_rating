<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $review = Review::find($request->review_id);
        
        if($request->user()->can('like-review', $review)) {
            $request->user()->likes()->toggle($request->review_id);     
            return Review::find($request->review_id)->likes()->count();    
        }
    }
}
