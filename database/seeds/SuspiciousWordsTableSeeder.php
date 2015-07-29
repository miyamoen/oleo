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
            ['word' => '振り込んで', 'weight' => 1.0],
            ['word' => '銀行', 'weight' => 1.0],
            ['word' => '口座', 'weight' => 1.0],
            ['word' => '振込', 'weight' => 1.0],
            ['word' => '交通事故', 'weight' => 1.0],
            ['word' => '慰謝料', 'weight' => 1.0],
            ['word' => '示談金', 'weight' => 1.0]
         ]);
    }
}
