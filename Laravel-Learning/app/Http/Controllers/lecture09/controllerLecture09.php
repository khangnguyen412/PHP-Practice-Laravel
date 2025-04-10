<?php

namespace App\Http\Controllers\Lecture09;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Illuminate\Http\Request;
use user;

class ControllerLecture09 extends Controller
{
    public function test_controller()
    {
        return "test success";
    }

    public function get_name($name = NULL)
    {
        return view('lecture09.param-to-controller', ['name' => $name]);
    }

    public function add_db(): View
    {
        $data = [
            'user_name'   => 'mary_johnson',
            'display_name'   => 'Mary Johnson',
            'email'   => 'mary.johnson@example.com',
            'password'   => 'hashed_password_11',
            'address'   => '808 Poplar Ave',
            'phone'   => '555-0111',
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
        DB::table('laravelweb_users')->insert($data);
        $users = DB::table('laravelweb_users')->get()->last(); // Lấy data cuối cùng (vừa add) từ database gán cho users 

        DB::table('laravelweb_users')->orderBy('user_id', 'desc')->limit(1)->delete();
        $users_after_delete = DB::table('laravelweb_users')->get(); // clear dữ liệu

        return view('lecture09.call-controller', ['users' => $users, 'users_after_delete' => $users_after_delete]);
    }
}
