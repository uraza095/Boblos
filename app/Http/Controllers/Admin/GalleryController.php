<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryImage::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $images = $query->orderBy('display_order')->paginate(20)->onEachSide(1)->withQueryString();
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'title' => 'nullable|string|max:255',
        ]);

        $order = GalleryImage::max('display_order') ?? 0;

        foreach ($request->file('images') as $index => $file) {
            $path = $file->store('gallery', 'public');
            GalleryImage::create([
                'title' => $request->title,
                'image' => $path,
                'display_order' => $order + $index + 1,
                'status' => 'active',
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery images uploaded successfully.');
    }

    public function destroy(GalleryImage $image)
    {
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        $image->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted successfully.');
    }

    public function destroyAll()
    {
        $images = GalleryImage::all();
        foreach ($images as $image) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }
        return redirect()->route('admin.gallery.index')->with('success', 'All gallery images deleted successfully.');
    }
}
