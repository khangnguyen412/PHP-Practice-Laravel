<?php

namespace App\Http\Controllers\Lecture13;

use App\Http\Controllers\Controller;
use App\Models\lecture13\ModelLecture13Users;
use App\Models\lecture13\ModelLecture13Products;
use App\Models\lecture13\ModelLecture13Post;
use Illuminate\Http\Request;

class ControllerLecture13 extends Controller
{
    /**
     * Relationship Eloquent 1 - 1
     */
    public function show_eloquent_relationship_13()
    {
        // $data = ModelLecture13Users::find(1)->user_profiles; // Lấy data có id = 1
        $data = ModelLecture13Users::with('user_profiles')->get(); // Lấy tất cả data
        return view('lecture13.view-lecture13', ['data' => $data]);
    }

    /**
     * Relationship Eloquent 1 - n
     */
    public function show_eloquent_relationship_13_1()
    {
        // $data = ModelLecture13Users::find(1)->products;
        $data = ModelLecture13Users::with('products')->get();
        return view('lecture13.view-lecture13', ['data' => $data]);
    }

    /**
     * Relationship Eloquent n - n
     */
    public function show_eloquent_relationship_13_2()
    {
        // $data = ModelLecture13Post::find(1)->categories; 
        $data = ModelLecture13Post::with('categories')->get()->toArray();
        return view('lecture13.view-lecture13', ['data' => $data]);
    }
}
