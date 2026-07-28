@extends('admin.layout')

@section('title', 'Edit Page Section')
@section('page_title', 'Edit Section: ' . $section->section_name)

@section('main_content')
<div class="w-full glass-panel rounded-2xl p-8 shadow-sm">
    <div class="mb-6">
        <a href="{{ route('admin.pages.show', $page) }}" class="px-4 py-2 border border-gray-200 text-gray-600 font-semibold text-xs rounded-xl hover:bg-gray-50 transition-all">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Sections
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-700 p-4 rounded-xl mb-6 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pages.sections.update', [$page, $section]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        @php
            $content = $section->content;
            $order = [];
            if ($section->section_key === 'home_why_choose') {
                $order = [
                    'title',
                    'description',
                    'image',
                    'hygienic_title',
                    'hygienic_desc',
                    'hygienic_icon',
                    'ambience_title',
                    'ambience_desc',
                    'ambience_icon'
                ];
            } elseif ($section->section_key === 'about_why_choose') {
                $order = [
                    'why_1_title', 'why_1_image',
                    'why_2_title', 'why_2_image',
                    'why_3_title', 'why_3_image',
                    'why_4_title', 'why_4_image',
                    'fact_1_title', 'fact_1_number', 'fact_1_text',
                    'fact_2_title', 'fact_2_number', 'fact_2_text',
                    'fact_3_title', 'fact_3_number', 'fact_3_text',
                    'fact_4_title', 'fact_4_number', 'fact_4_text',
                ];
            } elseif ($section->section_key === 'home_services') {
                $order = [
                    'title',
                    'celebrations_title',
                    'celebrations_desc',
                    'icon_one',
                    'dining_title',
                    'dining_desc',
                    'icon_two',
                    'hall_title',
                    'hall_desc',
                    'icon_three',
                    'catering_title',
                    'catering_desc',
                    'icon_four',
                    'image'
                ];
            }

            if (!empty($order)) {
                $sortedContent = [];
                foreach ($order as $k) {
                    if (array_key_exists($k, $content)) {
                        $sortedContent[$k] = $content[$k];
                    }
                }
                foreach ($content as $k => $v) {
                    if (!isset($sortedContent[$k])) {
                        $sortedContent[$k] = $v;
                    }
                }
                $content = $sortedContent;
            }
        @endphp

        @foreach ($content as $key => $value)
            @php
                $label = ucwords(str_replace('_', ' ', $key));
                $isVideo = strpos($key, 'video') !== false && strpos($key, 'video_url') === false && strpos($key, 'url') === false;
                $isImage = !$isVideo && strpos($key, 'url') === false && (strpos($key, 'image') !== false || strpos($key, 'logo') !== false || strpos($key, 'favicon') !== false || strpos($key, 'icon') !== false || (is_string($value) && strpos($value, 'pages/') === 0 && preg_match('/\.(mp4|webm|ogg)$/i', $value) === 0));
                $isLongText = !$isVideo && !$isImage && strpos($key, 'url') === false && (strpos($key, 'description') !== false || strpos($key, 'text') !== false || strpos($key, 'content') !== false) && strpos($key, 'button') === false;
            @endphp

            <div class="pb-6 last:pb-0">
                <label class="block text-sm font-semibold text-body-dark mb-2">{{ $label }}</label>

                @if ($isVideo)
                    @if ($value)
                        <div class="mb-3">
                            <video src="{{ asset('storage/' . $value) }}" controls class="w-64 h-36 object-cover rounded-xl border border-gray-200"></video>
                        </div>
                    @endif
                    <input type="file" name="content[{{ $key }}]" accept="video/*"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <p class="text-xs text-gray-500 mt-1">Accepts videos (mp4, webm, ogg). Max size: 40MB. Leave empty to keep current file.</p>

                @elseif ($isImage)
                    @if ($value)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $value) }}" alt="Preview" class="w-48 h-32 object-cover rounded-xl border border-gray-200">
                        </div>
                    @endif
                    <input type="file" name="content[{{ $key }}]" accept="image/*"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                    <p class="text-xs text-gray-500 mt-1">Accepts images (jpeg, png, webp). Leave empty to keep current file.</p>

                @elseif ($isLongText)
                    <textarea name="content[{{ $key }}]" rows="5" class="wysiwyg w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ $value }}</textarea>

                @else
                    <input type="text" name="content[{{ $key }}]" value="{{ $value }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                @endif
            </div>
        @endforeach

        <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Save Section Content
            </button>
            <a href="{{ route('admin.pages.show', $page) }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
