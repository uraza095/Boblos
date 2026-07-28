@extends('admin.layout')

@section('title', 'Manage Pages')
@section('page_title', 'Page Content Manager')

@section('main_content')
<div class="space-y-6">
    <p class="text-sm text-gray-500">Select a page below to view and edit its content sections (banners, text blocks, badges) dynamically without touching code.</p>

    <!-- Pages List -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-sm max-w-3xl">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Page Title</th>
                    <th class="px-6 py-4">Slug</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($pages as $page)
                    <tr>
                        <td class="px-6 py-4 font-semibold text-brand">{{ $page->title }}</td>
                        <td class="px-6 py-4 text-gray-500"><code>/{{ $page->slug === 'home' ? '' : $page->slug }}</code></td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2">
                            <a href="{{ route('admin.pages.edit', $page) }}" 
                                class="px-4 py-2 border border-gray-200 text-brand font-semibold text-xs rounded-xl hover:bg-brand-light hover:border-brand/20 transition-all">
                                <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Details
                            </a>
                            <a href="{{ route('admin.pages.show', $page) }}" 
                                class="px-4 py-2 border border-gray-200 text-brand font-semibold text-xs rounded-xl hover:bg-brand-light hover:border-brand/20 transition-all">
                                <i class="fa-solid fa-folder-open mr-1"></i> Manage Sections
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">No pages initialized yet. Run database seeds first.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
