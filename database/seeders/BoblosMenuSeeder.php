<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BoblosMenuSeeder extends Seeder
{
    public function run(): void
    {
        // Force delete existing and soft-deleted items and categories to start fresh
        MenuItem::withTrashed()->forceDelete();
        MenuCategory::withTrashed()->forceDelete();

        $jsonPath = storage_path('app/boblos_menu_import.json');
        if (!File::exists($jsonPath)) {
            $this->command->error("JSON menu file not found at: {$jsonPath}");
            return;
        }

        $categories = json_decode(File::get($jsonPath), true);
        
        $catOrder = 1;
        $totalCategories = 0;
        $totalItems = 0;

        foreach ($categories as $catData) {
            $catName = trim($catData['name']);
            $catSlug = Str::slug($catName);

            // Ensure unique slug for category
            $baseSlug = $catSlug;
            $count = 1;
            while (MenuCategory::withTrashed()->where('slug', $catSlug)->exists()) {
                $catSlug = "{$baseSlug}-{$count}";
                $count++;
            }

            $category = MenuCategory::create([
                'name' => $catName,
                'slug' => $catSlug,
                'description' => "Delicious {$catName} selection at Boblo's",
                'display_order' => $catOrder++,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ]);

            $totalCategories++;
            $itemOrder = 1;

            foreach ($catData['items'] as $itemData) {
                $itemName = trim($itemData['name']);
                $itemSlug = Str::slug($itemName);

                // Ensure unique slug for item
                $baseItemSlug = $itemSlug;
                $count = 1;
                while (MenuItem::withTrashed()->where('slug', $itemSlug)->exists()) {
                    $itemSlug = "{$baseItemSlug}-{$count}";
                    $count++;
                }

                $price = $itemData['price'] ?? 0.00;
                $description = $itemData['description'] ?? '';

                MenuItem::create([
                    'category_id' => $category->id,
                    'name' => $itemName,
                    'slug' => $itemSlug,
                    'description' => $description ?: "Freshly prepared {$itemName} with premium ingredients.",
                    'price' => $price,
                    'status' => 'available',
                    'display_order' => $itemOrder++,
                    'featured' => ($itemOrder <= 2), // feature first 2 items in category
                    'is_special' => false,
                ]);

                $totalItems++;
            }
        }

        echo "Import Completed: Added {$totalCategories} categories and {$totalItems} menu items!\n";
    }
}
