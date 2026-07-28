<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10)->onEachSide(1);
        return view('admin.pages.index', compact('pages'));
    }

    public function show(Page $page)
    {
        $sections = $page->sections;
        return view('admin.pages.show', compact('page', 'sections'));
    }

    public function editSection(Page $page, PageSection $section)
    {
        return view('admin.pages.edit-section', compact('page', 'section'));
    }

    public function updateSection(Request $request, Page $page, PageSection $section)
    {
        $content = $section->content;
        $updatedContent = [];

        foreach ($content as $key => $value) {
            // Check if this is an image upload
            if ($request->hasFile("content.{$key}")) {
                // Delete old image if it is stored as path
                if (is_string($value) && strpos($value, 'pages/') === 0) {
                    Storage::disk('public')->delete($value);
                }
                $path = $request->file("content.{$key}")->store('pages', 'public');
                $updatedContent[$key] = $path;
            } else {
                // Keep old value if file input is empty, otherwise get text field
                if ($request->has("content.{$key}")) {
                    $updatedContent[$key] = $request->input("content.{$key}");
                } else {
                    $updatedContent[$key] = $value;
                }
            }
        }

        $section->update([
            'content' => $updatedContent,
        ]);

        return redirect()->route('admin.pages.show', $page)->with('success', 'Section content updated successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ]);

        $page->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page details and SEO fields updated successfully.');
    }
}
