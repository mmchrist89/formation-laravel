<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits = [
            [
                "produit" => "Lait de beauté Bébé et Maman",
                "categorie" => "Cosmetique",
                "prix" => 2500,
                "description" => "",
            ],
            [
                "produit" => "Sardine",
                "categorie" => "Alimentation",
                "prix" => 450,
                "description" => "",
            ],
            [
                "produit" => "Smartphone Samsung Galaxy S30",
                "categorie" => "Electronic",
                "prix" => 122500,
                "description" => "",
            ],
            [
                "produit" => "Smartphone Lenovo 1MLK0",
                "categorie" => "Electronic",
                "prix" => 95000,
                "description" => "",
            ],
            [
                "produit" => "Parfum Lord UAE",
                "categorie" => "Cosmetic",
                "prix" => 15000,
                "description" => "",
            ],
        ];

        $prod = Produit::all();
        if(empty($prod))
        {
            foreach($produits as $pro)    
            {
                Produit::create($pro);
            }
        }
    }
}
