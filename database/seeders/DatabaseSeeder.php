<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\Setting;
use App\Models\Chef;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@fignolive.pk'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Menu Categories
        $categories = [
            'mezze-starters' => [
                'name' => 'Mezze / Starters',
                'description' => 'Our signature Mezze / Starters selection.',
                'display_order' => 1,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'soups-salads' => [
                'name' => 'Soups & Salads',
                'description' => 'Our signature Soups & Salads selection.',
                'display_order' => 2,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'pizza' => [
                'name' => 'Pizza',
                'description' => 'Our signature Pizza selection.',
                'display_order' => 3,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'fig-olive-favourites' => [
                'name' => 'Fig & Olive Favourites',
                'description' => 'Our signature Fig & Olive Favourites selection.',
                'display_order' => 4,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'steaks-chicken-beef' => [
                'name' => 'Steaks (Chicken / Beef)',
                'description' => 'Our signature Steaks (Chicken / Beef) selection.',
                'display_order' => 5,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'burger-sandwiches' => [
                'name' => 'Burger & Sandwiches',
                'description' => 'Our signature Burger & Sandwiches selection.',
                'display_order' => 6,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'mediterranean-bbq' => [
                'name' => 'Mediterranean BBQ',
                'description' => 'Our signature Mediterranean BBQ selection.',
                'display_order' => 7,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'mediterranean-platters' => [
                'name' => 'Mediterranean Platters',
                'description' => 'Our signature Mediterranean Platters selection.',
                'display_order' => 8,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'heritage-kitchen' => [
                'name' => 'Heritage Kitchen',
                'description' => 'Our signature Heritage Kitchen selection.',
                'display_order' => 9,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'pan-asian-bowl' => [
                'name' => 'Pan Asian Bowl',
                'description' => 'Our signature Pan Asian Bowl selection.',
                'display_order' => 10,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'tea-time-snack' => [
                'name' => 'Tea Time Snack',
                'description' => 'Our signature Tea Time Snack selection.',
                'display_order' => 11,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'desserts' => [
                'name' => 'Desserts',
                'description' => 'Our signature Desserts selection.',
                'display_order' => 12,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
            'lunch-deals' => [
                'name' => 'Lunch Deals',
                'description' => 'Our signature Lunch Deals selection.',
                'display_order' => 13,
                'status' => 'active',
                'show_on_homepage' => true,
                'show_on_home_menu' => true,
            ],
        ];

        $catModels = [];
        foreach ($categories as $slug => $data) {
            $catModels[$slug] = MenuCategory::updateOrCreate(['slug' => $slug], $data);
        }


        // 3. Seed Menu Items
        $menuItems = [
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Thai Pepper Wings',
                'description' => 'Delicious wings coated in a flavoursome Thai sauce.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Finger Fish Chips',
                'description' => 'A traditional dish that serves great as a small snack or a main meal for our younger clients. Served with fries and tartar sauce.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Loaded Nachos',
                'description' => 'Crispy tortillas made by our chef topped with chicken, cheese, jalapeño, olives, capsicum, iceberg, salsa and sour cream sauce. Excellent for sharing.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Loaded Fries',
                'description' => 'Served with chicken, jalapeño, olives, capsicum, cheddar cheese and sun-dried tomatoes.',
                'price' => 1495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Chicken Strip',
                'description' => 'Tender strips of breaded chicken, fried until crispy and served with French fries. Popular with our younger clients.',
                'price' => 995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Chicken Dumplings',
                'description' => 'Soft dumplings filled with seasoned chicken, served with a savory dipping sauce.',
                'price' => 995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Dynamite Chicken',
                'description' => 'Crispy chicken bites coated in a spicy dynamite sauce.',
                'price' => 1495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'French Fries',
                'description' => 'Crispy golden fries, lightly salted.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Hummus',
                'description' => 'A smooth blend of chickpeas, tahini, lemon, garlic, and olive oil.',
                'price' => 995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Mutabbal',
                'description' => 'Smoky roasted eggplant blended with tahini, garlic, and lemon.',
                'price' => 495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Labneh',
                'description' => 'Creamy strained yogurt finished with olive oil and herbs.',
                'price' => 495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Muhammara',
                'description' => 'A rich roasted red pepper and walnut dip with a hint of spice.',
                'price' => 495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mezze-starters',
                'name' => 'Mezze Trio',
                'description' => 'A delicious trio of Mutabbal, Labneh, and Muhammara, perfect for sharing at a special price.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Hot & Sour Soup',
                'description' => 'Spicy and soothing. All soups are served with fish crackers.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Chicken Corn Soup',
                'description' => 'Traditional comforting soup. An all-year-round favourite. All soups are served with fish crackers.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Cream of Mushroom Soup',
                'description' => 'A rich, velvety mushroom soup made with fresh carrots and onions, blended with cream and a hint of butter. Served with garlic bread.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Cream of Chicken Soup',
                'description' => 'A creamy, comforting chicken soup with tender chicken pieces, infused with garlic, onion, and a hint of white pepper. Finished with parsley and served with garlic bread.',
                'price' => 795.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Thai Beef Salad',
                'description' => 'Thinly sliced beef tossed in green salad leaves, cucumber, tomato, mint and a Thai-inspired flavoursome sauce.',
                'price' => 1595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Tabbouleh',
                'description' => 'A refreshing Mediterranean salad with finely chopped parsley, tomatoes, mint, onions, and bulgur, tossed in lemon juice and olive oil.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Caesar\'s Salad',
                'description' => 'Grilled chicken salad with iceberg, cherry tomatoes, bread croutons and olives, topped with Parmesan cheese, olive oil and our chef\'s special Caesar dressing.',
                'price' => 1595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Greek Salad',
                'description' => 'Sliced cucumbers, tomatoes, iceberg, red onions, olives and feta cheese, topped with oregano and a sprinkle of olive oil. A great side for any main dish.',
                'price' => 1595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Grilled Chicken Salad',
                'description' => 'A healthy serving of salad with capsicum, iceberg, tomatoes and onion, topped with Parmesan cheese, olive oil and mayo vinaigrette dressing, with grilled chicken.',
                'price' => 1395.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Sunshine Salad',
                'description' => 'A bright, fresh fruit salad with a light zesty dressing, perfect for a refreshing bite.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'soups-salads',
                'name' => 'Fattoush',
                'description' => 'A crisp and colorful salad made with fresh vegetables, toasted tortilla bread, and a tangy lemon sumac dressing.',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pizza',
                'name' => 'F&O Signature Pizza',
                'description' => 'Our house favourite with rich tomato sauce, pizza cheese, olives, chicken and sausage on a golden crust.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pizza',
                'name' => 'Fajita Pizza',
                'description' => 'Tender chicken, peppers, onions, and pizza cheese.',
                'price' => 1595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pizza',
                'name' => 'Margherita Pizza',
                'description' => 'Tomato sauce, pizza cheese, and basil on a crisp base.',
                'price' => 1395.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Chicken Parmesan',
                'description' => 'Fried, crispy chicken breast topped with Parmesan cheese, served with a side of white pasta and sautéed vegetables.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Chicken Ala Kiev',
                'description' => 'Crispy and tender chicken filled and topped with delicious cheesy white sauce, served on creamy mashed potatoes with fresh sautéed vegetables.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Moroccan Chicken',
                'description' => 'Grilled chicken topped with our chef\'s special spicy red sauce, served with sautéed vegetables and mashed potatoes.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Polo Chicken',
                'description' => 'Golden and crispy chicken breast stuffed with melted cheese, spinach, mushroom and almond. Topped with mustard sauce.',
                'price' => 2295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Stuffed Grilled Chicken',
                'description' => 'Grilled chicken breast stuffed with bell pepper, mushrooms and cheese. Served with sautéed vegetables, mushroom sauce and mashed potatoes.',
                'price' => 2295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Fettuccine Alfredo',
                'description' => 'Fettuccine pasta in a rich, creamy garlic white cheese sauce, served with garlic bread.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Spinach Cheese Pasta with Chicken',
                'description' => 'Creamy pasta with fresh spinach, rich cheese sauce and tender chicken pieces. Garnished with grated Parmesan and served with garlic bread.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Spicy Fettuccine',
                'description' => 'Pasta tossed in a spicy creamy sauce with chicken, Parmesan and bell pepper.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Mac & Cheese',
                'description' => 'Classic creamy macaroni baked with rich, melted cheese.',
                'price' => 1595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Penne Arrabiata with Grilled Chicken',
                'description' => 'Penne pasta tossed in red sauce, vegetables and fresh basil. Topped with Parmesan cheese and served with garlic bread.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Fish & Chips',
                'description' => 'Fish marinated in our special batter, fried and served with chips and our special tartar sauce.',
                'price' => 2295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Fish Steak',
                'description' => 'Juicy, grilled fish fillet seasoned with herbs and spices, served with a zesty sauce.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'fig-olive-favourites',
                'name' => 'Fish Tikka',
                'description' => 'Succulent fish marinated in aromatic spices and barbecued to perfection with a smoky finish.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Swiss Mushroom Steak (Chicken)',
                'description' => 'Grilled steak topped with creamy mushroom sauce and sautéed vegetables.',
                'price' => 2495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Swiss Mushroom Steak (Beef)',
                'description' => 'Grilled steak topped with creamy mushroom sauce and sautéed vegetables.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Jalapeño Steak (Chicken)',
                'description' => 'Grilled sizzling steak served with jalapeño sauce and a side of your choice.',
                'price' => 2495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Jalapeño Steak (Beef)',
                'description' => 'Grilled sizzling steak served with jalapeño sauce and a side of your choice.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Tarragon Steak (Chicken)',
                'description' => 'Juicy grilled steak topped with a creamy tarragon sauce.',
                'price' => 2495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Tarragon Steak (Beef)',
                'description' => 'Juicy grilled steak topped with a creamy tarragon sauce.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'French Onion Steaks (Chicken)',
                'description' => 'Grilled steak topped with caramelized onions and rich French onion sauce.',
                'price' => 2495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'French Onion Steaks (Beef)',
                'description' => 'Grilled steak topped with caramelized onions and rich French onion sauce.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Black Pepper Steak (Chicken)',
                'description' => 'Grilled steak topped with creamy black pepper sauce and a side of your choice.',
                'price' => 2595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Black Pepper Steak (Beef)',
                'description' => 'Grilled steak topped with creamy black pepper sauce and a side of your choice.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Half & Half Steak (Chicken)',
                'description' => 'Grilled steak served with any two signature sauces of your choice.',
                'price' => 2595.0,
                'image' => null,
            ],
            [
                'category_slug' => 'steaks-chicken-beef',
                'name' => 'Half & Half Steak (Beef)',
                'description' => 'Grilled steak served with any two signature sauces of your choice.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Fig & Olive Beef Burger',
                'description' => 'Grilled beef patty with cheese, fresh vegetables, and signature sauce.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Jalapeño Beef Burger',
                'description' => 'Juicy beef patty topped with jalapeños, melted cheese, and creamy jalapeño sauce.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Mushroom Beef Burger',
                'description' => 'Grilled beef patty finished with creamy mushroom sauce and melted cheese.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Lava Burger',
                'description' => 'Juicy beef patty loaded with melted cheese and creamy lava sauce.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Grilled Chicken Burger',
                'description' => 'Grilled chicken breast with fresh vegetables and French mustard.',
                'price' => 1495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Chicken & Cheese Sandwich',
                'description' => 'Grilled chicken layered with melted cheese, lettuce, and tomato.',
                'price' => 1395.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Club Sandwich',
                'description' => 'Triple-layered chicken sandwich served with crispy fries and coleslaw.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Chicken Doner',
                'description' => 'Seasoned chicken doner wrapped with fresh vegetables and garlic sauce.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Chicken Fajita Wrap',
                'description' => 'Grilled chicken tossed in fajita spices, wrapped with fresh vegetables.',
                'price' => 1495.0,
                'image' => null,
            ],
            [
                'category_slug' => 'burger-sandwiches',
                'name' => 'Quesadillas',
                'description' => 'Toasted tortillas stuffed with grilled chicken and melted cheese, served with salsa and sour cream.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Beef Adana Kebab',
                'description' => 'Spiced beef kebabs grilled to perfection. Served with fragrant zafarani rice and fresh vegetables.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Chicken Adana Kebab',
                'description' => 'Juicy chicken kebabs seasoned with Mediterranean spices. Served with zafarani rice and fresh vegetables.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Lebanese Sheesh Taouk',
                'description' => 'Tender marinated chicken grilled over an open flame. Served with zafarani rice and fresh vegetables.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Iskandari Tikka',
                'description' => 'Succulent grilled chicken drumsticks with aromatic spices. Served with zafarani rice and fresh vegetables.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Turkish Urfa Kebab',
                'description' => 'Mildly spiced Turkish beef kebabs with rich flavors. Served with zafarani rice and signature sauces.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Greek Kefta',
                'description' => 'Traditional Mediterranean beef kofta with aromatic herbs. Served with fragrant zafarani rice.',
                'price' => 1895.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Chelow Kebab',
                'description' => 'Classic Persian grilled kebabs with authentic flavors. Served with fragrant zafarani rice.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Harissa Sheesh Boti',
                'description' => 'Smoky grilled chicken infused with spicy harissa. Served with fragrant zafarani rice.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Lamb Shank',
                'description' => 'Slow-cooked lamb shank, tender and fall off the bone. Finished with a rich, flavorful sauce.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-bbq',
                'name' => 'Persian Joojeh Kebab',
                'description' => 'Saffron-marinated chicken grilled until juicy and tender. Served with fragrant zafarani rice.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-platters',
                'name' => 'Mediterranean Grill',
                'description' => 'A sharing platter of Chicken Adana, Beef Adana, Sheesh Taouk, Pasha Boti, and Iskandari Tikka. Served with zafarani rice, pita bread, fresh salad, and signature sauces.',
                'price' => 3995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-platters',
                'name' => 'F&O Chef Special Platter',
                'description' => 'A premium mix of Chicken Adana, Beef Urfa, Iskandari Tikka, Sheesh Taouk, and Pasha Boti. Served with half Chicken Karahi, naan, rice, salad, sauces, and Turkish mezze.',
                'price' => 7995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'mediterranean-platters',
                'name' => 'F&O Family Platter',
                'description' => 'A grand selection of signature kebabs, tikka, Sheesh Taouk, Kefta, Harissa Boti, and Pasha Boti. Served with half Makhni Handi, half Mughlai Handi, naan, rice, salads, sauces, and mezze.',
                'price' => 10995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Mutton Karahi (Half)',
                'description' => 'Mutton cooked in our special tomato gravy with mixed special spices.',
                'price' => 2995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Mutton Karahi (Full)',
                'description' => 'Mutton cooked in our special tomato gravy with mixed special spices.',
                'price' => 4995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Chicken Karahi',
                'description' => 'Chicken cooked in thick and spicy tomato gravy.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Chicken Makhni Handi',
                'description' => 'Creamy boneless chicken handi cooked with butter, spices, and a smooth makhni sauce.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Mughlai Handi',
                'description' => 'Rich and creamy chicken handi cooked with aromatic Mughlai spices.',
                'price' => 1995.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Nan Basket',
                'description' => 'A fresh assorted basket of soft, warm naan served with your meal.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Plain Nan',
                'description' => 'Soft and fluffy traditional naan, freshly baked and served warm.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'heritage-kitchen',
                'name' => 'Roti',
                'description' => 'Classic whole wheat roti, simple, fresh, and perfect with desi dishes.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Dragon Chicken',
                'description' => 'Spicy marinated chicken lightly fried for crispness and then sautéed with bell peppers, topped with sesame seeds.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Chicken Manchurian',
                'description' => 'Crispy thigh chicken pieces in a spicy, tangy, sweet sauce.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Kung Pao Chicken',
                'description' => 'Chinese chicken, capsicum, bell peppers and onion, topped with dry peanuts in an aromatic red chilli chef special sauce.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Chicken Chilli Dry',
                'description' => 'Chicken strips sautéed with green chillies and ginger slices.',
                'price' => 1395.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Szechuan Chicken',
                'description' => 'Tender pieces of chicken stir-fried with colourful vegetables in a sweet and savoury Szechuan sauce.',
                'price' => 1295.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Chicken Cashew Nut',
                'description' => 'Tender chicken tossed with roasted cashews, vegetables, and a savory-sweet sauce.',
                'price' => 1395.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Mongolian Beef',
                'description' => 'Thinly sliced beef with spring onions and ginger.',
                'price' => 1695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Beef Chilli Dry',
                'description' => 'Crispy beef strips stir-fried with green chillies and ginger.',
                'price' => 1795.0,
                'image' => null,
            ],
            [
                'category_slug' => 'pan-asian-bowl',
                'name' => 'Fish Chilli Dry',
                'description' => 'Tender pieces of fish stir-fried with ginger and green chillies to make a spicy mix.',
                'price' => 1795.0,
                'image' => null,
            ],
            [
                'category_slug' => 'tea-time-snack',
                'name' => 'Chicken Samosa',
                'description' => '',
                'price' => 795.0,
                'image' => null,
            ],
            [
                'category_slug' => 'tea-time-snack',
                'name' => 'Potato Samosa',
                'description' => '',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'tea-time-snack',
                'name' => 'Spring Roll',
                'description' => '',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'tea-time-snack',
                'name' => 'Assorted Pakoras',
                'description' => '',
                'price' => 795.0,
                'image' => null,
            ],
            [
                'category_slug' => 'tea-time-snack',
                'name' => 'Chaat Platter',
                'description' => '',
                'price' => 695.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'Molten Lava Cake',
                'description' => 'Decadent chocolate cake with a gooey, molten center, served warm and paired with a scoop of vanilla ice cream.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'Skillet Brownie',
                'description' => 'Warm, fudgy brownie baked in a skillet, topped with banana, a scoop of ice cream and drizzled with chocolate sauce.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'Basboosa',
                'description' => 'A traditional Middle Eastern dessert crafted from semolina and coconut powder, sweetened with maple syrup and honey, and garnished with crunchy almonds.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'NY Cheesecake',
                'description' => 'Rich and creamy cheesecake with a smooth, velvety texture, set atop a crumbly base and served with a choice of strawberry or blueberry sauce.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'Fudge Brownie',
                'description' => 'Dense and chewy brownie made with rich chocolate and cocoa powder, topped with icing sugar and baked to gooey perfection.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'desserts',
                'name' => 'Three Milk Cake',
                'description' => 'Soft sponge cake soaked in a mixture of three types of milk and cream, topped with whipped cream and pistachio.',
                'price' => 0.0,
                'image' => null,
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 1',
                'description' => 'Shawarma Combo',
                'price' => 995.0,
                'image' => 'menu-items/deal-1.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 2',
                'description' => 'Lunch Bowl Set',
                'price' => 1295.0,
                'image' => 'menu-items/deal-2.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 3',
                'description' => 'Pizza & Sandwich Combo',
                'price' => 1995.0,
                'image' => 'menu-items/deal-3.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 4',
                'description' => 'Wrap & Shawarma Combo',
                'price' => 1995.0,
                'image' => 'menu-items/deal-4.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 5',
                'description' => 'Dual Burger Feast',
                'price' => 2550.0,
                'image' => 'menu-items/deal-5.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 6',
                'description' => 'Pan Asian Chicken Platter',
                'price' => 2550.0,
                'image' => 'menu-items/deal-6.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 7',
                'description' => 'Chicken Steak Offer',
                'price' => 3850.0,
                'image' => 'menu-items/deal-7.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 8',
                'description' => 'Pasta & Quesadillas Combo',
                'price' => 4295.0,
                'image' => 'menu-items/deal-8.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 9',
                'description' => 'Signature BBQ Platter',
                'price' => 4795.0,
                'image' => 'menu-items/deal-9.jpg',
            ],
            [
                'category_slug' => 'lunch-deals',
                'name' => 'Lunch Deal 10',
                'description' => 'Imperial Platter Set',
                'price' => 5295.0,
                'image' => 'menu-items/deal-10.jpg',
            ],
        ];

        $itemCounts = [];
        foreach ($menuItems as $item) {
            $catSlug = $item['category_slug'];
            if (!isset($itemCounts[$catSlug])) {
                $itemCounts[$catSlug] = 1;
            } else {
                $itemCounts[$catSlug]++;
            }
            $itemSlug = Str::slug($item['name']);
            $originalSlug = $itemSlug;
            $count = 1;
            while (MenuItem::where('slug', $itemSlug)->exists()) {
                $itemSlug = $originalSlug . '-' . $count;
                $count++;
            }
            MenuItem::updateOrCreate(
                ['slug' => $itemSlug],
                [
                    'category_id' => $catModels[$catSlug]->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                    'status' => 'available',
                    'display_order' => $itemCounts[$catSlug],
                    'featured' => false,
                    'is_special' => false,
                ]
            );
        }


        // 4. Seed Page & Sections for all pages
        $pages = [
            'home' => 'Home Page',
            'about' => 'About Us Page',
            'deals' => 'Special Deals Page',
            'bar' => 'Bar & Lounge Page',
            'contact' => 'Contact Us Page',
            'portfolio' => 'Portfolio Page',
            'testimonials-page' => 'Testimonials Page',
        ];

        foreach ($pages as $slug => $title) {
            $p = Page::updateOrCreate(
                ['slug' => $slug],
                ['title' => $title]
            );

            // Add corresponding section
            if ($slug === 'home') {
                PageSection::updateOrCreate(
                    ['section_key' => 'home_hero'],
                    [
                        'page_id' => $p->id,
                        'section_name' => 'Home Hero Section',
                        'content' => [
                            'badge' => 'Sweet & Elegant',
                            'title_line_one' => 'Simply',
                            'title_line_two' => 'Patisserie',
                            'button_one_text' => 'View menu',
                            'button_one_url' => '/menu',
                            'button_two_text' => 'Book an Event',
                            'button_two_url' => '/menu',
                            'upload_video' => '',
                        ]
                    ]
                );
                
                // Only the home_hero section is maintained for the home page
            } elseif ($slug === 'about') {
                PageSection::updateOrCreate(
                    ['section_key' => 'about_story'],
                    [
                        'page_id' => $p->id,
                        'section_name' => 'Our Story',
                        'content' => [
                            'badge' => 'Our Story',
                            'title' => 'Every Flavor Tells A Story',
                            'content' => 'Fig & Olive is Gulberg Greens premier culinary destination, serving exceptional Mediterranean and heritage cuisine in a stunningly designed restaurant and bar lounge.',
                        ]
                    ]
                );

                PageSection::updateOrCreate(
                    ['section_key' => 'about_why_choose'],
                    [
                        'page_id' => $p->id,
                        'section_name' => 'Why Choose Us',
                        'content' => [
                            'why_1_title' => 'Master Chefs',
                            'why_1_image' => '',
                            'why_2_title' => 'Premium Quality',
                            'why_2_image' => '',
                            'why_3_title' => 'Elegant Ambiance',
                            'why_3_image' => '',
                            'why_4_title' => 'Heritage Recipes',
                            'why_4_image' => '',
                            'fact_1_number' => '1500',
                            'fact_1_title' => 'Monthly Visitors',
                            'fact_1_text' => 'We proudly serve thousands of happy guests every month, delivering unforgettable dining experiences.',
                            'fact_2_number' => '850',
                            'fact_2_title' => 'Positive Reviews',
                            'fact_2_text' => 'Our commitment to culinary excellence is reflected in hundreds of glowing five-star reviews from our patrons.',
                            'fact_3_number' => '45',
                            'fact_3_title' => 'Signature Dishes',
                            'fact_3_text' => 'Explore our diverse menu featuring an exclusive selection of original Mediterranean and heritage recipes.',
                            'fact_4_number' => '5',
                            'fact_4_title' => 'Awards Won',
                            'fact_4_text' => 'Recognized as a premier dining destination in Gulberg Greens for outstanding food quality and service.',
                        ]
                    ]
                );
            } elseif ($slug === 'deals') {
                PageSection::updateOrCreate(
                    ['section_key' => 'deals_header'],
                    [
                        'page_id' => $p->id,
                        'section_name' => 'Deals Intro text',
                        'content' => [
                            'badge' => 'Exquisite Value',
                            'title' => 'Lunch Deals Are Live',
                            'description' => 'Experience the culinary artistry of Fig & Olive at exceptional value. We are proud to present our newly launched, curated Lunch Deals.',
                        ]
                    ]
                );
            } elseif ($slug === 'bar') {
                PageSection::updateOrCreate(
                    ['section_key' => 'bar_header'],
                    [
                        'page_id' => $p->id,
                        'section_name' => 'Lounge Bar Intro text',
                        'content' => [
                            'badge' => 'Pure Refreshment',
                            'title' => 'Lounge Bar & Beverages',
                            'description' => 'Welcome to the Lounge Bar at Fig & Olive. We craft artisanal mocktails, refreshing smoothies, and specialty coffee.',
                        ]
                    ]
                );
            }
        }

        // 5. Seed General Settings
        $settings = [
            'site_name' => 'Fig & Olive',
            'contact_phone' => '0345 0845454',
            'contact_email' => 'info@fignolive.pk',
            'contact_address' => 'One Piccadilly, Business Square, Gulberg Greens, Islamabad, Pakistan',
            'opening_hours' => 'Daily: 8:00 AM - 11:30 PM',
            'facebook_url' => 'https://www.facebook.com/figandolive.pk/',
            'instagram_url' => 'https://www.instagram.com/figandolive.pk/',
            'whatsapp_url' => 'https://wa.me/923450845454',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 6. Seed Chefs
        $chefs = [
            [
                'name' => 'Saeed Khan',
                'role' => 'Executive Chef',
                'description' => 'Saeed Khan brings over 15 years of culinary expertise, crafting signatures with fresh local produce.',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'display_order' => 1
            ],
            [
                'name' => 'Zahid Mehmood',
                'role' => 'General Manager',
                'description' => 'Zahid Mehmood oversees daily operations, ensuring Fig & Olive signature warm hospitality is delivered to every guest.',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'display_order' => 2
            ],
            [
                'name' => 'Mufeed Ahmed',
                'role' => 'Beverage Director',
                'description' => 'Mufeed Ahmed heads our mixology, creating fresh seasonal smoothies, mocktails, and specialty hot brews.',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'display_order' => 3
            ]
        ];

        foreach ($chefs as $c) {
            Chef::updateOrCreate(
                ['name' => $c['name']],
                [
                    'role' => $c['role'],
                    'description' => $c['description'],
                    'facebook_url' => $c['facebook_url'],
                    'instagram_url' => $c['instagram_url'],
                    'display_order' => $c['display_order'],
                    'status' => 'active'
                ]
            );
        }

        // 7. Seed Testimonials
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'role' => 'Food Critic',
                'content' => 'The Stuffed Mushrooms were a revelation! Fig & Olive sets a new benchmark for fine dining in Islamabad.',
                'rating' => 5,
                'display_order' => 1
            ],
            [
                'name' => 'Michael Chang',
                'role' => 'Regular Guest',
                'content' => 'Outstanding atmosphere, exceptionally friendly staff, and the Saudi Champagne is absolutely refreshment redefined.',
                'rating' => 5,
                'display_order' => 2
            ],
            [
                'name' => 'Amna Malik',
                'role' => 'Local Diner',
                'content' => 'Beautiful aesthetics and top quality food. The Caprese Skewers are fresh, light, and perfectly seasoned.',
                'rating' => 4,
                'display_order' => 3
            ]
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['name' => $t['name']],
                [
                    'role' => $t['role'],
                    'content' => $t['content'],
                    'rating' => $t['rating'],
                    'display_order' => $t['display_order'],
                    'status' => 'active'
                ]
            );
        }

        // 8. Seed Blogs
        Blog::updateOrCreate(
            ['slug' => 'the-art-of-mediterranean-grilling'],
            [
                'title' => 'The Art of Mediterranean Grilling',
                'content' => 'Exploring the wood-fired heritage grilling techniques that give our signature skewers their smoky flavor and juicy texture.',
                'author_name' => 'Executive Chef Saeed Khan',
                'tags' => 'Grill, Mediterranean, Dining',
                'status' => 'published'
            ]
        );

        Blog::updateOrCreate(
            ['slug' => 'mixology-and-botanicals-at-fig-and-olive'],
            [
                'title' => 'Mixology and Botanicals at Fig & Olive',
                'content' => 'A closer look at how our beverage director, Mufeed Ahmed, uses fresh local herbs and cold pressed juices to mix premium Saudi Champagne and mocktails.',
                'author_name' => 'Mufeed Ahmed',
                'tags' => 'Lounge, Bar, Mocktails',
                'status' => 'published'
            ]
        );
    }
}
