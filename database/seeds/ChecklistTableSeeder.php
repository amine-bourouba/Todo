<?php

use Illuminate\Database\Seeder;

class ChecklistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checklist = factory(App\Models\Checklist::class, 5)->create();
    }
}
