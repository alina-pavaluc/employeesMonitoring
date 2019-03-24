<?php

use App\User;
use App\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alina Pavaluc',
            'email' => 'alinapavaluc@monitoring.com',
            'user_type' => UserType::EMPLOYER,
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => Hash::make('admin')
        ]);
    }
}
