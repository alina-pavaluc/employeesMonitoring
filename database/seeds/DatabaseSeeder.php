<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployerSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
