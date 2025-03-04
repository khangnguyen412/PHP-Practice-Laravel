<?php

namespace App\Http\Controllers\lecture09;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Illuminate\Http\Request;
use user;

class controllerLecture09 extends Controller
{
    public function testController()
    {
        echo "test success";
    }

    public function getName($name = NULL, $age = NULL)
    {
        ?>
            <p>đầy là hàm getName() trong controllerLecture09</p>
        <?php
        if ($name != Null && $age != NULL) {
            ?>
                <p> có tham số Name là <?php echo $name ?> và Age là <?php echo $age ?></p>
            <?php
        } elseif ($age == NULL) {
            ?>
                <p> có tham số Name là <?php echo $name ?> </p>
            <?php
        }
    }

    public function addDB(): View
    {
        $data = [
            'ACCOUNT_ID'   => 31,
            'AVAIL_BALANCE'   => 6000,
            'CLOSE_DATE'   => NULL,
            'LAST_ACTIVITY_DATE'   => '2004-12-17',
            'OPEN_DATE'   => '2004-12-15',
            'PENDING_BALANCE'   => 6000,
            'STATUS'   => 'ACTIVE',
            'CUST_ID'   => 10,
            'OPEN_BRANCH_ID'   => 1,
            'OPEN_EMP_ID'   => 1,
            'PRODUCT_CD'  => 'CD'
        ];
        DB::table('account')->insert( $data );
        $users = DB::table('account')->where('ACCOUNT_ID', 31)->get(); // lấy tất cả dữ liệu từ database gán cho users 
        
        DB::table('account')->where('ACCOUNT_ID', 31)->delete();
        $usersAfterDelete = DB::table('account')->get(); // clear dữ liệu

        return view('lecture09.viewLecture09', ['users' => $users, 'usersAfterDelete' => $usersAfterDelete]);
    }
}
