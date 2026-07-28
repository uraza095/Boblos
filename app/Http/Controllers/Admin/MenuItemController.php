<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuItem::with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $items = $query->orderBy('display_order')->paginate(10)->onEachSide(1)->withQueryString();
        $categories = MenuCategory::all();

        return view('admin.menu-items.index', compact('items', 'categories'));
    }

    public function create()
    {
        $categories = MenuCategory::whereNull('parent_id')->with('children')->get();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0|lt:price',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'tags' => 'nullable|string',
            'status' => 'required|in:available,unavailable',
            'display_order' => 'required|integer|min:0',
            'featured' => 'nullable|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (MenuItem::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        MenuItem::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'image' => $imagePath,
            'tags' => $request->tags,
            'status' => $request->status,
            'display_order' => $request->display_order,
            'featured' => $request->has('featured'),
            'is_special' => $request->has('is_special'),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item created successfully.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = MenuCategory::whereNull('parent_id')->with('children')->get();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0|lt:price',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'tags' => 'nullable|string',
            'status' => 'required|in:available,unavailable',
            'display_order' => 'required|integer|min:0',
            'featured' => 'nullable|boolean',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $imagePath = $menuItem->image;
        if ($request->hasFile('image')) {
            if ($menuItem->image) {
                Storage::disk('public')->delete($menuItem->image);
            }
            $imagePath = $request->file('image')->store('menu-items', 'public');
        }

        $menuItem->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'image' => $imagePath,
            'tags' => $request->tags,
            'status' => $request->status,
            'display_order' => $request->display_order,
            'featured' => $request->has('featured'),
            'is_special' => $request->has('is_special'),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item soft-deleted successfully.');
    }
}
