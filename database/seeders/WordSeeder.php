<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Words;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Words::insert(['id' => 1, 'name' => 'hello']);
        Words::insert(['id' => 2, 'name' => 'world']);
        Words::insert(['id' => 3, 'name' => 'jazz']);
        Words::insert(['id' => 4, 'name' => 'lucky']);
        Words::insert(['id' => 5, 'name' => 'unzip']);
        Words::insert(['id' => 6, 'name' => 'scratch']);
        Words::insert(['id' => 7, 'name' => 'jelly']);
        Words::insert(['id' => 8, 'name' => 'hanged']);
        Words::insert(['id' => 9, 'name' => 'horse']);
        Words::insert(['id' => 10, 'name' => 'chair']);
        Words::insert(['id' => 11, 'name' => 'banjo']);
        Words::insert(['id' => 12, 'name' => 'injury']);
    }
}
