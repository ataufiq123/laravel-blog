<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset table comments
        DB::table('comments')->truncate();

        //insert 10 dummy data to comments
        $comments = [];
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) {
            $date = date('Y-m-d H:i:s', strtotime("2018-03-08 11:43:00 +{$i} days"));
            $comments[] = [
                'post_id' => rand(1, 10),
                'body' => $faker->sentence(rand(10, 12), true),
                'created_at' => $date,
                'updated_at' => $date
            ];
        }

        DB::table('comments')->insert($comments);
    }
}