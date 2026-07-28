@extends('admin.layout')

@section('title', 'Edit Blog')
@section('page_title', 'Edit Blog Post')

@section('main_content')
<div class="w-full glass-panel rounded-2xl p-8 shadow-sm">
    @if ($errors->any())
        <div class="bg-red-50 text-red-700 p-4 rounded-xl mb-6 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label for="title" class="block text-sm font-semibold text-body-dark mb-2">Blog Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-body-dark mb-2">Article Body</label>
            <textarea name="content" id="content" rows="10" class="wysiwyg w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="author_name" class="block text-sm font-semibold text-body-dark mb-2">Author Name</label>
                <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $blog->author_name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="tags" class="block text-sm font-semibold text-body-dark mb-2">Tags</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $blog->tags) }}" placeholder="Grill, Recipe, Lounge"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                <p class="text-[10px] text-gray-400 mt-1">Separate with commas</p>
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-body-dark mb-2">Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-body-dark mb-2">Cover Image</label>
            @if ($blog->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Preview" class="w-48 h-28 object-cover rounded-xl border border-gray-200">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <!-- SEO Metadata Card -->
        <div class="p-6 rounded-xl border border-white/10 bg-white/5 space-y-4">
            <h3 class="text-base font-bold text-[#fce4e8] border-b border-white/10 pb-2">SEO Fields</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-body-dark mb-2">Meta Title</label>
                    <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $blog->seo_title) }}" placeholder="SEO Optimized Title"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-body-dark mb-2">Meta Keywords</label>
                    <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords', $blog->seo_keywords) }}" placeholder="keywords, separated, by, commas"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>
            </div>

            <div>
                <label for="seo_description" class="block text-sm font-semibold text-body-dark mb-2">Meta Description</label>
                <textarea name="seo_description" id="seo_description" rows="3" placeholder="Brief SEO description of the article..."
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('seo_description', $blog->seo_description) }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Update Article
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
