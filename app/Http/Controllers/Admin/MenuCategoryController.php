<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = MenuCategory::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->withCount('menuItems')->orderBy('display_order')->paginate(10)->onEachSide(1)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = MenuCategory::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'parent_id' => 'nullable|exists:menu_categories,id',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name);
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 1;
        while (MenuCategory::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('categories/thumbnails', 'public');
        }

        MenuCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $imagePath,
            'thumbnail' => $thumbnailPath,
            'display_order' => $request->display_order,
            'status' => $request->status,
            'show_on_homepage' => $request->boolean('show_on_homepage'),
            'show_on_home_menu' => $request->boolean('show_on_home_menu'),
            'parent_id' => $request->parent_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(MenuCategory $category)
    {
        $parentCategories = MenuCategory::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, MenuCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'parent_id' => 'nullable|exists:menu_categories,id',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $thumbnailPath = $category->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail) {
                Storage::disk('public')->delete($category->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('categories/thumbnails', 'public');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'thumbnail' => $thumbnailPath,
            'display_order' => $request->display_order,
            'status' => $request->status,
            'show_on_homepage' => $request->boolean('show_on_homepage'),
            'show_on_home_menu' => $request->boolean('show_on_home_menu'),
            'parent_id' => $request->parent_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(MenuCategory $category)
    {
        // Keep image on soft delete, or we can delete it when force-deleting.
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category soft-deleted successfully.');
    }
}
