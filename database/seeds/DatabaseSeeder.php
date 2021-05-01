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
        $facts = config('facts');

        foreach($facts as $fact)
        {
            DB::table('facts')->insert([
                'fact' => $fact,
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
