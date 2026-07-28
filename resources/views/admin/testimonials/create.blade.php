@extends('admin.layout')

@section('title', 'Add Testimonial')
@section('page_title', 'Create Testimonial')

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

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-body-dark mb-2">Client Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="role" class="block text-sm font-semibold text-body-dark mb-2">Designation / Role</label>
                <input type="text" name="role" id="role" value="{{ old('role') }}" placeholder="Food Critic, Regular Guest"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-body-dark mb-2">Review Content</label>
            <textarea name="content" id="content" rows="4" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('content') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="rating" class="block text-sm font-semibold text-body-dark mb-2">Rating</label>
                <select name="rating" id="rating" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    @for ($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} Stars</option>
                    @endfor
                </select>
            </div>

            <div>
                <label for="display_order" class="block text-sm font-semibold text-body-dark mb-2">Display Order</label>
                <input type="number" name="display_order" id="display_order" value="{{ old('display_order', 0) }}" min="0" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold text-body-dark mb-2">Status</label>
                <select name="status" id="status" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div>
            <label for="image" class="block text-sm font-semibold text-body-dark mb-2">Profile Photo</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Save Testimonial
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
