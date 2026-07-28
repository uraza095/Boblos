@extends('admin.layout')

@section('title', 'Gallery')
@section('page_title', 'Gallery Images')

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.gallery.index') }}" method="GET" class="flex gap-3 max-w-sm w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search gallery..."
                class="flex-1 px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Search
            </button>
        </form>

        <div class="flex items-center gap-3">
            @if ($images->count() > 0)
                <form action="{{ route('admin.gallery.destroyAll') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ALL gallery images? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2.5 bg-red-600 text-white font-bold text-sm rounded-xl hover:bg-red-700 transition-all flex items-center gap-1.5">
                        <i class="fa-solid fa-trash"></i> Delete All
                    </button>
                </form>
            @endif
            <a href="{{ route('admin.gallery.create') }}" class="px-5 py-2.5 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5">
                <i class="fa-solid fa-plus"></i> Upload Images
            </a>
        </div>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 p-6">
            @forelse ($images as $image)
                <div class="relative group rounded-xl overflow-hidden border border-white/10 bg-white/5 aspect-square">
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-all" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3">
                        <p class="text-white text-xs font-semibold truncate">{{ $image->title ?? 'Image #' . $image->id }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-white/50">
                    <i class="fa-solid fa-images text-4xl mb-3 block"></i>
                    <p class="text-sm font-medium">No gallery images found. Upload some images to get started.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div>{{ $images->links() }}</div>
</div>
@endsection
