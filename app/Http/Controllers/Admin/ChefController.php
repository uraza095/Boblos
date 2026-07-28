<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    public function index(Request $request)
    {
        $query = Chef::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $chefs = $query->orderBy('display_order')->paginate(10)->onEachSide(1)->withQueryString();
        return view('admin.chefs.index', compact('chefs'));
    }

    public function create()
    {
        return view('admin.chefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('chefs', 'public');
        }

        Chef::create([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $imagePath,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'display_order' => $request->display_order,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.chefs.index')->with('success', 'Chef profile created successfully.');
    }

    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit', compact('chef'));
    }

    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $chef->image;
        if ($request->hasFile('image')) {
            if ($chef->image) {
                Storage::disk('public')->delete($chef->image);
            }
            $imagePath = $request->file('image')->store('chefs', 'public');
        }

        $chef->update([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'image' => $imagePath,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'display_order' => $request->display_order,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.chefs.index')->with('success', 'Chef profile updated successfully.');
    }

    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('admin.chefs.index')->with('success', 'Chef profile soft-deleted successfully.');
    }
}
