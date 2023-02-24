<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactReasons;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactReasons::create(['reason'=>'Dúvida']);
        ContactReasons::create(['reason'=>'Elogio']);
        ContactReasons::create(['reason'=>'Reclamação']);
    }
}
