@extends('admin.layout')

@section('title', 'Categories')
@section('page_title', 'Menu Categories')

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-3 max-w-sm w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..."
                class="flex-1 px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Search
            </button>
        </form>

        <a href="{{ route('admin.categories.create') }}" class="px-5 py-2.5 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5">
            <i class="fa-solid fa-plus"></i> Add Category
        </a>
    </div>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Image</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Display Order</th>
                    <th class="px-6 py-4">Products Count</th>
                    <th class="px-6 py-4">Featured</th>
                    <th class="px-6 py-4">Show on home Menu</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if ($category->thumbnail)
                                    <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }} thumbnail" class="w-10 h-10 object-cover rounded-lg border border-white/10" title="Thumbnail">
                                @elseif ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-10 h-10 object-cover rounded-lg border border-white/10" title="Main Image">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-brand">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $category->display_order }}</td>
                        <td class="px-6 py-4 text-gray-600 font-semibold">{{ $category->menu_items_count }}</td>
                        <td class="px-6 py-4">
                            @if ($category->show_on_homepage)
                                <span class="px-2.5 py-1 bg-[#ee7c8b] text-white text-xs font-bold rounded-lg shadow-sm">Yes</span>
                            @else
                                <span class="px-2.5 py-1 bg-[#2d0a14] text-[#ee7c8b] text-xs font-bold rounded-lg border border-[#ee7c8b]/30">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($category->show_on_home_menu)
                                <span class="px-2.5 py-1 bg-[#ee7c8b] text-white text-xs font-bold rounded-lg shadow-sm">Yes</span>
                            @else
                                <span class="px-2.5 py-1 bg-[#2d0a14] text-[#ee7c8b] text-xs font-bold rounded-lg border border-[#ee7c8b]/30">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($category->status === 'active')
                                <span class="px-2.5 py-1 bg-brand-light text-brand text-xs font-bold rounded-lg border border-brand/10">Active</span>
                            @else
                                <span class="px-2.5 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                    class="p-2 border border-gray-200 text-gray-600 hover:text-brand hover:border-brand/20 hover:bg-brand-light rounded-xl transition-all"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to soft-delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="p-2 border border-gray-200 text-gray-600 hover:text-red-700 hover:border-red-100 hover:bg-red-50 rounded-xl transition-all"
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $categories->links() }}
    </div>
</div>
@endsection
