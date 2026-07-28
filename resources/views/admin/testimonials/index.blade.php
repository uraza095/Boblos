@extends('admin.layout')

@section('title', 'Testimonials')
@section('page_title', 'Client Testimonials')

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.testimonials.index') }}" method="GET" class="flex gap-3 max-w-sm w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search client name..."
                class="flex-1 px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Search
            </button>
        </form>

        <a href="{{ route('admin.testimonials.create') }}" class="px-5 py-2.5 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5">
            <i class="fa-solid fa-plus"></i> Add Testimonial
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Client Photo</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Designation</th>
                    <th class="px-6 py-4">Rating</th>
                    <th class="px-6 py-4">Order</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Photo" class="w-12 h-12 object-cover rounded-full">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-brand">{{ $testimonial->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $testimonial->role }}</td>
                        <td class="px-6 py-4 text-yellow-500 font-bold">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-{{ $i < $testimonial->rating ? 'solid' : 'regular' }} fa-star text-xs"></i>
                            @endfor
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $testimonial->display_order }}</td>
                        <td class="px-6 py-4">
                            @if ($testimonial->status === 'active')
                                <span class="px-2.5 py-1 bg-brand-light text-brand text-xs font-bold rounded-lg border border-brand/10">Active</span>
                            @else
                                <span class="px-2.5 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                    class="p-2 border border-gray-200 text-gray-600 hover:text-brand hover:border-brand/20 hover:bg-brand-light rounded-xl transition-all"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">No testimonials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $testimonials->links() }}</div>
</div>
@endsection
