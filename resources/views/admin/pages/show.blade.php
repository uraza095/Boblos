@extends('admin.layout')

@section('title', 'Manage Page Content')
@section('page_title', 'Manage Sections: ' . $page->title)

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold text-xs rounded-xl hover:bg-gray-50 transition-all">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Pages
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Section Name</th>
                    <th class="px-6 py-4">Section Identifier</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($sections as $section)
                    <tr>
                        <td class="px-6 py-4 font-semibold text-brand">{{ $section->section_name }}</td>
                        <td class="px-6 py-4 text-gray-500"><code>{{ $section->section_key }}</code></td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.pages.sections.edit', [$page, $section]) }}" 
                                class="px-4 py-2 border border-brand text-brand font-semibold text-xs rounded-xl hover:bg-brand hover:text-white transition-all">
                                <i class="fa-solid fa-pen mr-1"></i> Edit Section Fields
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">No sections added to this page yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
