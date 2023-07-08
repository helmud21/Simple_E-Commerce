<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function selectCategory(Request $request){
        $search = $request->search;
        $response = [];
        $category = Category::orderby('category_name','asc')
          ->where('category_name', 'like', "%".$search."%")
          ->select('id_category','category_name')
          ->limit(5)
          ->get();
        foreach($category as $item){
          $response[] = array(
            'id' => $item->id_category,
            'text' => $item->category_name
          );
        }

        return response()->json($response);
    }
}
