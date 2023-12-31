<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Daftarkerja;
use App\Models\tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = tag::factory(10)->create();

         User::factory(20)->create()->each(function($user) use ($tags){
            Daftarkerja::factory(rand(1, 4))->create([
                'user_id' => $user->id
            ])->each(function($Daftarkerja) use($tags){
                $Daftarkerja->tags()->attach($tags->random(2));
            });
         });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
