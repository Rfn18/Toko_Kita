<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategoris;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategoris::create(['nama_kategori' => 'kaos']);         
        Kategoris::create(['nama_kategori' => 'hoodie']);         
        Kategoris::create(['nama_kategori' => 'jaket']);         
        Kategoris::create(['nama_kategori' => 'sepatu']);         
    }
}
