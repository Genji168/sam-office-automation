<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $copiers = [
            [
                'name' => 'Canon imageRUNNER ADV C5035',
                'slug' => 'canon-ir-adv-c5035',
                'price' => 2450.00,
                'category' => 'Multifunction Copier',
                'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4c59eaa6?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'name' => 'Canon imageRUNNER ADV C5560',
                'slug' => 'canon-ir-adv-c5560',
                'price' => 3800.00,
                'category' => 'High-Speed Color Copier',
                'img' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'name' => 'Canon imageRUNNER ADV 4545',
                'slug' => 'canon-ir-adv-4545',
                'price' => 1890.00,
                'category' => 'Monochrome Photocopier',
                'img' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'name' => 'C5035 Fuser Unit Assembly',
                'slug' => 'c5035-fuser-unit-assembly',
                'price' => 80.00,
                'category' => 'Fuser Component',
                'img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'name' => 'C5560 Toner Drive Motor',
                'slug' => 'c5560-toner-drive-motor',
                'price' => 25.00,
                'category' => 'Drive Motor',
                'img' => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'name' => 'ATR Sensor Harness Kit',
                'slug' => 'atr-sensor-harness-kit',
                'price' => 55.00,
                'category' => 'Electrical Diagnostics',
                'img' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        foreach ($copiers as $copier) {
            Product::create([
                'name' => $copier['name'],
                'slug' => $copier['slug'],
                'description' => 'High-performance ' . $copier['category'] . ' engineered for professional office automation.',
                'price' => $copier['price'],
                'stock' => 15,
                'image_url' => $copier['img'],
            ]);
        }
    }
}
?>