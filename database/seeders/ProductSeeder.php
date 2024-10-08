<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            "Cipta Residence 2",
            "The Rich",
            "Namoramble City",
            "Grand Banten",
            "Turi Mansion",
            "Cipta Residence 1"
        ])->each(fn($product) => Product::create(["nama_produk" => $product]));
    }
}
