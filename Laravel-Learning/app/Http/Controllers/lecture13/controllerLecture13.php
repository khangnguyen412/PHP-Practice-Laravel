<?php

namespace App\Http\Controllers\lecture13;

use App\Http\Controllers\Controller;
use App\Models\lecture13\model_lecture13_customer;
use App\Models\lecture13\model_lecture13_individual;
use App\Models\lecture13\model_lecture13_officer;
use App\Models\lecture13\model_lecture13_account;
use App\Models\lecture13\model_lecture13_level;
use Illuminate\Http\Request;

class controllerLecture13 extends Controller
{
    /**
     * Relationship Eloquent 1 - 1
     */
    public function show_eloquent_relationship_13(){
        $data_user = model_lecture13_customer::find(1)->individual;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
    /**
     * Relationship Eloquent 1 - n
     */
    public function show_eloquent_relationship_13_1(){
        $data_user = model_lecture13_customer::find(1)->officer;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
    /**
     * Relationship Eloquent n - n
     */
    public function show_eloquent_relationship_13_2(){
        $data_user = model_lecture13_account::find(1)->level;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
}
