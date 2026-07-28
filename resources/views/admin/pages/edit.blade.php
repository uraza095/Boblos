@extends('admin.layout')

@section('title', 'Edit Page Details')
@section('page_title', 'Edit Page Details & SEO')

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

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-semibold text-body-dark mb-2">Page Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="slug" class="block text-sm font-semibold text-body-dark mb-2">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <!-- SEO Metadata Card -->
        <div class="p-6 rounded-xl border border-white/10 bg-white/5 space-y-4">
            <h3 class="text-base font-bold text-[#fce4e8] border-b border-white/10 pb-2">SEO Fields</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-body-dark mb-2">Meta Title</label>
                    <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $page->seo_title) }}" placeholder="SEO Optimized Title"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-body-dark mb-2">Meta Keywords</label>
                    <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords', $page->seo_keywords) }}" placeholder="keywords, separated, by, commas"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>
            </div>

            <div>
                <label for="seo_description" class="block text-sm font-semibold text-body-dark mb-2">Meta Description</label>
                <textarea name="seo_description" id="seo_description" rows="3" placeholder="Brief SEO description of the page..."
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('seo_description', $page->seo_description) }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Update Page
            </button>
            <a href="{{ route('admin.pages.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
