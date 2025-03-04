<?php

namespace App\Http\Controllers\lecture13;

use App\Http\Controllers\Controller;
use App\Models\lecture13\modelLecture13;
use Illuminate\Http\Request;

class controllerLecture13 extends Controller
{
    /**
     * Relationship Eloquent 1 - 1
     */
    public function show_eloquent_relationship_13(){
        $data_user = modelLecture13::find(1)->Passport;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
    /**
     * Relationship Eloquent 1 - n
     */
    public function show_eloquent_relationship_13_1(){
        $data_user = modelLecture13::find(1)->Visa;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
    /**
     * Relationship Eloquent n - n
     */
    public function show_eloquent_relationship_13_2(){
        $data_user = modelLecture13::find(1)->Country;
        return view('lecture13.viewLecture13', ['data' => $data_user]);
    }
}
