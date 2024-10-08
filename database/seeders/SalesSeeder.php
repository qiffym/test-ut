<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            "sales 1",
            "sales 2",
            "sales 3"
        ])->each(fn($sales) => Sales::create(["nama_sales" => $sales]));
    }
}
