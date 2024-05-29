<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [['role' => 'petugas'], ['role' => 'admin']];

        foreach ($data as $key => $val){
            Level::create($val);
        }
    }
}
