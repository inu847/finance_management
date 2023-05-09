<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Pemasukan',
            'status' => 1
        ]);

        Category::create([
            'name' => 'Pengeluaran',
            'status' => 1
        ]);
    }
}
