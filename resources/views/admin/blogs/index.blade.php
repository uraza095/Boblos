@extends('admin.layout')

@section('title', 'Blogs List')
@section('page_title', 'Blogs & Articles')

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.blogs.index') }}" method="GET" class="flex gap-3 max-w-sm w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search blog title..."
                class="flex-1 px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Search
            </button>
        </form>

        <a href="{{ route('admin.blogs.create') }}" class="px-5 py-2.5 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5">
            <i class="fa-solid fa-plus"></i> Write Blog Post
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Cover Image</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Author</th>
                    <th class="px-6 py-4">Tags</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Created Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($blogs as $blog)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Cover" class="w-16 h-10 object-cover rounded-lg">
                            @else
                                <div class="w-16 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <i class="fa-solid fa-file-invoice"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-brand max-w-xs truncate">{{ $blog->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $blog->author_name }}</td>
                        <td class="px-6 py-4 text-gray-500">
                            @if($blog->tags)
                                <div class="flex flex-wrap gap-1">
                                    @foreach($blog->tags_array as $t)
                                        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-[10px] font-semibold">{{ $t }}</span>
                                    @endforeach
                                </div>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($blog->status === 'published')
                                <span class="px-2.5 py-1 bg-brand-light text-brand text-xs font-bold rounded-lg border border-brand/10">Published</span>
                            @else
                                <span class="px-2.5 py-1 bg-yellow-50 text-yellow-600 text-xs font-bold rounded-lg border border-yellow-100">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $blog->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                    class="p-2 border border-gray-200 text-gray-600 hover:text-brand hover:border-brand/20 hover:bg-brand-light rounded-xl transition-all"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">No blog posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $blogs->links() }}</div>
</div>
@endsection
