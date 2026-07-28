@extends('admin.layout')

@section('title', 'Edit Category')
@section('page_title', 'Edit Menu Category')

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

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-body-dark mb-2">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="parent_id" class="block text-sm font-semibold text-body-dark mb-2">Parent Category (Optional)</label>
                <select name="parent_id" id="parent_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="">None (Top Level)</option>
                    @foreach($parentCategories as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-body-dark mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-body-dark mb-2">Category Image</label>
                @if ($category->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Preview" class="w-32 h-32 object-cover rounded-xl border border-gray-200">
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                <p class="text-xs text-gray-500 mt-1">Main category banner/image. Leave blank to keep existing image.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-body-dark mb-2">Thumbnail Image</label>
                @if ($category->thumbnail)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Thumbnail Preview" class="w-32 h-32 object-cover rounded-xl border border-gray-200">
                    </div>
                @endif
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                <p class="text-xs text-gray-500 mt-1">Small icon/thumbnail image. Leave blank to keep existing thumbnail.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="display_order" class="block text-sm font-semibold text-body-dark mb-2">Display Order</label>
                <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $category->display_order) }}" min="0" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-body-dark mb-2">Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="active" {{ old('status', $category->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $category->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="flex items-center gap-2 py-2">
            <input type="checkbox" name="show_on_homepage" id="show_on_homepage" value="1" {{ old('show_on_homepage', $category->show_on_homepage) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-gray-300 text-brand focus:ring-brand focus:ring-offset-0 bg-transparent">
            <label for="show_on_homepage" class="text-sm font-semibold text-body-dark cursor-pointer">Feature</label>
        </div>

        <div class="flex items-center gap-2 py-2">
            <input type="checkbox" name="show_on_home_menu" id="show_on_home_menu" value="1" {{ old('show_on_home_menu', $category->show_on_home_menu) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-gray-300 text-brand focus:ring-brand focus:ring-offset-0 bg-transparent">
            <label for="show_on_home_menu" class="text-sm font-semibold text-body-dark cursor-pointer">Show on home Menu</label>
        </div>

        <!-- SEO Metadata Card -->
        <div class="p-6 rounded-xl border border-white/10 bg-white/5 space-y-4">
            <h3 class="text-base font-bold text-[#fce4e8] border-b border-white/10 pb-2">SEO Fields</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-body-dark mb-2">Meta Title</label>
                    <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $category->seo_title) }}" placeholder="SEO Optimized Title"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-body-dark mb-2">Meta Keywords</label>
                    <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords', $category->seo_keywords) }}" placeholder="keywords, separated, by, commas"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>
            </div>

            <div>
                <label for="seo_description" class="block text-sm font-semibold text-body-dark mb-2">Meta Description</label>
                <textarea name="seo_description" id="seo_description" rows="3" placeholder="Brief SEO description of the category..."
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('seo_description', $category->seo_description) }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Update Category
            </button>
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
