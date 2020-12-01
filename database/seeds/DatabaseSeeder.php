<?php

use App\Enquiry;
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
        $enquirys = factory(App\Enquiry::class, 20)->create();
    }
}
