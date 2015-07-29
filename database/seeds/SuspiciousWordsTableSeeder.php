<?php

use Illuminate\Database\Seeder;

class SuspiciousWordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suspicious_words')->insert([
            ['word' => '$B?6$j9~$s$G(B', 'weight' => 1.0],
            ['word' => '$B6d9T(B', 'weight' => 1.0],
            ['word' => '$B8}:B(B', 'weight' => 1.0],
            ['word' => '$B?69~(B', 'weight' => 1.0],
            ['word' => '$B8rDL;v8N(B', 'weight' => 1.0],
            ['word' => '$B0V<UNA(B', 'weight' => 1.0],
            ['word' => '$B<(CL6b(B', 'weight' => 1.0]
         ]);
    }
}
