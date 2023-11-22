<?php

namespace Database\Seeders;

use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::all()->each(function (Cabang $cabang) {
            Ranting::factory()->count(2)->create([
                'cabang_id' => $cabang->id,
            ]);
        });
    }
}
