<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class SearchController extends Controller
{
    public function autoComplete(Request $request)
    {
        if($request->address) {
            $input = $request->address;
            $data = Place::where('address','LIKE', "%$input%")->get();
            $output =  '<ul  class="bg-gray-100 rounded px-6">';
            foreach($data as $row) {
                $output .=  '<li class="flex items-center justify-between my-4">'.$row->address.'<li>';
            }
            $output .= '<ul>';

            return $output;
        }
    }

    public function show(Request $request)
    {
        $places = Place::search($request)->get();

        return view('list', compact('places'));
    }
}
