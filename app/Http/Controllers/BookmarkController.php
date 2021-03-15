<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function bookmark($place_id)
    {
        auth()->user()->bookmarks()->toggle($place_id);

        return back();
    }

    public function getByUser()
    {
        $bookmarks = auth()->user()->bookmarks;

        return view('user_bookmarks', compact('bookmarks'));
    }
}
