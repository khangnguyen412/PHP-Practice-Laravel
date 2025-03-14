<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\lecture13\ModelLecture13Account;
use App\Models\lecture13\ModelLecture13Level;

class DatabaseSeederAcountLevel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  - Seeding database trong bảng pivot
         *  - Khai báo var và lib của 2 bảng cha
         *  - Add data theo cú pháp:
         *      $[bảng-1]->[method-ORM]->attach( $[bảng-2]->random()->[khoá-chính-bảng-2],  ['[col-name]' => '[value]']);
         */
        $table_account  =   ModelLecture13Account::all();
        $table_level    =   ModelLecture13Level::all();
        foreach ($table_account as $key => $account){
            $account->level()->attach($table_level->random()->level_id, ['assigned_at' => now()]);
        }
    }
}
