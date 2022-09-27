<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Models\User;//model table users

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputan['name'] = 'Rama';
        $inputan['email'] = 'ainunrama17@gmail.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('123456');//passwordnya 123258
        $inputan['phone'] = '08817168321';
        $inputan['alamat'] = 'malang';
        $inputan['role'] = 'admin';//kita akan membuat akun atau users in dengan role admin
        User::create($inputan);

    }
}