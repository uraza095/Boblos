@extends('admin.layout')

@section('title', 'Edit Chef Profile')
@section('page_title', 'Edit Chef Profile')

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

    <form action="{{ route('admin.chefs.update', $chef) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-body-dark mb-2">Chef Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $chef->name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="role" class="block text-sm font-semibold text-body-dark mb-2">Role / Designation</label>
                <input type="text" name="role" id="role" value="{{ old('role', $chef->role) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-semibold text-body-dark mb-2">Biography / Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('description', $chef->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="facebook_url" class="block text-sm font-semibold text-body-dark mb-2">Facebook URL</label>
                <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $chef->facebook_url) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="instagram_url" class="block text-sm font-semibold text-body-dark mb-2">Instagram URL</label>
                <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $chef->instagram_url) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="display_order" class="block text-sm font-semibold text-body-dark mb-2">Display Order</label>
                <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $chef->display_order) }}" min="0" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-body-dark mb-2">Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="active" {{ old('status', $chef->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $chef->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-body-dark mb-2">Chef Headshot</label>
            @if ($chef->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $chef->image) }}" alt="Preview" class="w-32 h-32 object-cover rounded-xl border border-gray-200">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Update Chef Profile
            </button>
            <a href="{{ route('admin.chefs.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
