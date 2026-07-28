@extends('admin.layout')

@section('title', 'Add Menu Item')
@section('page_title', 'Create Menu Item')

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

    <form action="{{ route('admin.menu-items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-body-dark mb-2">Item Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="parent_category" class="block text-sm font-semibold text-body-dark mb-2">Category</label>
                <select id="parent_category" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" data-has-children="{{ $cat->children->count() > 0 ? 'true' : 'false' }}">
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div id="subcategory_container" style="display: none;">
                <label for="subcategory" class="block text-sm font-semibold text-body-dark mb-2">Subcategory</label>
                <select id="subcategory" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="">Select Subcategory</option>
                    @foreach ($categories as $cat)
                        @foreach ($cat->children as $child)
                            <option value="{{ $child->id }}" data-parent="{{ $cat->id }}" style="display: none;">
                                {{ $child->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="category_id" id="final_category_id" value="{{ old('category_id') }}" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-body-dark mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-semibold text-body-dark mb-2">Price (PKR)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="discounted_price" class="block text-sm font-semibold text-body-dark mb-2">Discounted Price (PKR) - Optional</label>
                <input type="number" name="discounted_price" id="discounted_price" value="{{ old('discounted_price') }}" step="0.01" min="0"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div>
            <label for="image" class="block text-sm font-semibold text-body-dark mb-2">Item Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            <p class="text-xs text-gray-500 mt-1">Recommended size: 500x500px, Max size: 40MB</p>
        </div>

        <div>
            <label for="tags" class="block text-sm font-semibold text-body-dark mb-2">Tags</label>
            <input type="text" name="tags" id="tags" value="{{ old('tags') }}" placeholder="Spicy, Vegan, Best Seller"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            <p class="text-xs text-gray-500 mt-1">Separate tags with commas</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="display_order" class="block text-sm font-semibold text-body-dark mb-2">Display Order</label>
                <input type="number" name="display_order" id="display_order" value="{{ old('display_order', 0) }}" min="0" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-body-dark mb-2">Availability Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Available</option>
                    <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>
        </div>

        <div class="flex items-center gap-6 py-2">
            <label class="flex items-center text-sm font-semibold text-body-dark">
                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-brand focus:ring-brand mr-2">
                Mark as Featured (shows on homepage slider/badge)
            </label>

            <label class="flex items-center text-sm font-semibold text-body-dark">
                <input type="checkbox" name="is_special" value="1" {{ old('is_special') ? 'checked' : '' }}
                    class="rounded border-gray-300 text-brand focus:ring-brand mr-2">
                Special Dish
            </label>
        </div>

        <!-- SEO Metadata Card -->
        <div class="p-6 rounded-xl border border-white/10 bg-white/5 space-y-4">
            <h3 class="text-base font-bold text-[#fce4e8] border-b border-white/10 pb-2">SEO Fields</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="seo_title" class="block text-sm font-semibold text-body-dark mb-2">Meta Title</label>
                    <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}" placeholder="SEO Optimized Title"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="seo_keywords" class="block text-sm font-semibold text-body-dark mb-2">Meta Keywords</label>
                    <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords') }}" placeholder="keywords, separated, by, commas"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>
            </div>

            <div>
                <label for="seo_description" class="block text-sm font-semibold text-body-dark mb-2">Meta Description</label>
                <textarea name="seo_description" id="seo_description" rows="3" placeholder="Brief SEO description of the menu item..."
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('seo_description') }}</textarea>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Save Item
            </button>
            <a href="{{ route('admin.menu-items.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parentSelect = document.getElementById('parent_category');
        const subContainer = document.getElementById('subcategory_container');
        const subSelect = document.getElementById('subcategory');
        const finalInput = document.getElementById('final_category_id');

        function updateCategory() {
            const selectedOption = parentSelect.options[parentSelect.selectedIndex];
            if (!selectedOption || !selectedOption.value) {
                subContainer.style.display = 'none';
                finalInput.value = '';
                return;
            }

            const hasChildren = selectedOption.getAttribute('data-has-children') === 'true';
            
            if (hasChildren) {
                subContainer.style.display = 'block';
                // Hide all subcategory options first
                Array.from(subSelect.options).forEach(opt => {
                    if (opt.value === '') return;
                    opt.style.display = opt.getAttribute('data-parent') === parentSelect.value ? 'block' : 'none';
                });
                
                // If subcategory has a value that belongs to parent, keep it, else clear
                const currentSubOpt = subSelect.options[subSelect.selectedIndex];
                if (!currentSubOpt || currentSubOpt.getAttribute('data-parent') !== parentSelect.value) {
                    subSelect.value = '';
                    finalInput.value = '';
                } else {
                    finalInput.value = subSelect.value;
                }
            } else {
                subContainer.style.display = 'none';
                subSelect.value = '';
                finalInput.value = parentSelect.value;
            }
        }

        parentSelect.addEventListener('change', updateCategory);
        subSelect.addEventListener('change', function() {
            if (this.value) {
                finalInput.value = this.value;
            } else {
                finalInput.value = ''; // Force selection of subcategory if it has children
            }
        });
    });
</script>
@endsection
