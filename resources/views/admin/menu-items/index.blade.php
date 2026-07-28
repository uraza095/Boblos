@extends('admin.layout')

@section('title', 'Menu Items')
@section('page_title', 'Menu Items (Food & Drinks)')

@section('main_content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <!-- Search and Filter Form -->
        <form action="{{ route('admin.menu-items.index') }}" method="GET" class="flex flex-wrap gap-3 max-w-2xl w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search items..."
                class="px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent max-w-xs w-full">
            
            <select name="category_id" 
                class="px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Filter
            </button>
        </form>

        <a href="{{ route('admin.menu-items.create') }}" class="px-5 py-2.5 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5 shrink-0">
            <i class="fa-solid fa-plus"></i> Add Menu Item
        </a>
    </div>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Image</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Discount</th>
                    <th class="px-6 py-4">Featured</th>
                    <th class="px-6 py-4">Special</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($items as $item)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-12 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-brand block">{{ $item->name }}</span>
                            @if($item->tags)
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach($item->tags_array as $tag)
                                        <span class="px-1.5 py-0.5 bg-gray-100 text-gray-600 rounded text-[10px] font-semibold">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $item->category->name }}</td>
                        <td class="px-6 py-4 font-bold text-brand">{{ $item->price ? 'Rs. ' . number_format($item->price, 2) : 'Coming soon' }}</td>
                        <td class="px-6 py-4 text-gray-500">
                            @if ($item->discounted_price)
                                <span class="text-green-600 font-bold">Rs. {{ number_format($item->discounted_price, 2) }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->featured)
                                <span class="px-2.5 py-1 bg-[#ee7c8b] text-white text-xs font-bold rounded-lg shadow-sm">Yes</span>
                            @else
                                <span class="px-2.5 py-1 bg-[#2d0a14] text-[#ee7c8b] text-xs font-bold rounded-lg border border-[#ee7c8b]/30">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->is_special)
                                <span class="px-2.5 py-1 bg-[#ee7c8b] text-white text-xs font-bold rounded-lg shadow-sm">Yes</span>
                            @else
                                <span class="px-2.5 py-1 bg-[#2d0a14] text-[#ee7c8b] text-xs font-bold rounded-lg border border-[#ee7c8b]/30">No</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($item->status === 'available')
                                <span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-lg border border-green-100">Available</span>
                            @else
                                <span class="px-2.5 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100">Unavailable</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.menu-items.edit', $item) }}" 
                                    class="p-2 border border-gray-200 text-gray-600 hover:text-brand hover:border-brand/20 hover:bg-brand-light rounded-xl transition-all"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.menu-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to soft-delete this menu item?');">
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
                        <td colspan="8" class="px-6 py-12 text-center text-gray-500">No menu items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $items->links() }}
    </div>
</div>
@endsection
