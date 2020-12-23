<?php

use Illuminate\Database\Seeder;
use App\Models\ActClass;
class ActClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ActClass::class, 5)->create();
    }
}
