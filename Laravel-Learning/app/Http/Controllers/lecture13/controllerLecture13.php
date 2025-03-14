<?php

namespace App\Http\Controllers\Lecture13;

use App\Http\Controllers\Controller;
use App\Models\lecture13\ModelLecture13Customer;
use App\Models\lecture13\ModelLecture13Account;
use Illuminate\Http\Request;

class ControllerLecture13 extends Controller
{
    /**
     * Relationship Eloquent 1 - 1
     */
    public function show_eloquent_relationship_13()
    {
        //$data_user = ModelLecture13Customer::find(1)->individual; // Lấy data có id = 1
        $data_user = ModelLecture13Customer::with('individual')->get(); // Lấy tất cả data
        return view('lecture13.view-lecture13', ['data' => $data_user]);
    }

    /**
     * Relationship Eloquent 1 - n
     */
    public function show_eloquent_relationship_13_1()
    {
        // $data_user = ModelLecture13Customer::find(1)->officer;
        $data_user = ModelLecture13Customer::with('officer')->get();
        return view('lecture13.view-lecture13', ['data' => $data_user]);
    }

    /**
     * Relationship Eloquent n - n
     */
    public function show_eloquent_relationship_13_2()
    {
        // $data_user = ModelLecture13Account::find(1)->level; 
        $data_user = ModelLecture13Account::with('level')->get()->toArray();
        return view('lecture13.view-lecture13', ['data' => $data_user]);
    }
}
