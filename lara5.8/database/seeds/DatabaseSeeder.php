<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // appel seeders  
        $this->call(UsersTableSeeder::class);
        $this->call(EntreprisesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
    }
}
