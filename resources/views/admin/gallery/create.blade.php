@extends('admin.layout')

@section('title', 'Upload Gallery Images')
@section('page_title', 'Upload Gallery Images')

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

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-sm font-semibold text-body-dark mb-2">Title (Optional - applied to all images)</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. Restaurant Interior"
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div>
            <label class="block text-sm font-semibold text-body-dark mb-2">Gallery Images</label>
            <div id="gallery-dropzone" class="rounded-xl border-2 border-dashed border-white/20 bg-white/3 hover:border-[#fce4e8] hover:bg-white/8 transition-all cursor-pointer flex flex-col items-center justify-center py-12 px-6 text-center">
                <i class="fa-solid fa-cloud-arrow-up text-[#fce4e8] text-4xl mb-4"></i>
                <p class="font-bold text-white text-base mb-1">Upload Gallery Images</p>
                <p class="text-white/55 text-sm font-medium">Drag & drop multiple files here, or <span class="text-[#fce4e8] underline font-semibold">browse</span></p>
                <p class="text-white/35 text-xs mt-1">Supports: JPG, PNG, WEBP (Max 40MB each) — Select multiple files</p>
            </div>
            <input type="file" name="images[]" id="gallery-input" multiple accept="image/*" class="hidden skip-dropzone">
        </div>

        <div id="preview-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"></div>

        <div class="flex items-center gap-3 pt-4 border-t border-white/10">
            <button type="submit" id="upload-btn" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Upload Images
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="px-6 py-3 border border-white/20 text-white font-semibold text-sm rounded-xl hover:bg-white/10 transition-all">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropzone = document.getElementById('gallery-dropzone');
    const input = document.getElementById('gallery-input');
    const previewContainer = document.getElementById('preview-container');
    let files = [];

    dropzone.addEventListener('click', () => input.click());

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.borderColor = '#fce4e8';
        dropzone.style.backgroundColor = 'rgba(255, 255, 255, 0.08)';
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.style.borderColor = 'rgba(255, 255, 255, 0.2)';
        dropzone.style.backgroundColor = 'rgba(255, 255, 255, 0.03)';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.style.borderColor = 'rgba(255, 255, 255, 0.2)';
        dropzone.style.backgroundColor = 'rgba(255, 255, 255, 0.03)';
        addFiles(e.dataTransfer.files);
    });

    input.addEventListener('change', (e) => {
        addFiles(e.target.files);
    });

    function addFiles(newFiles) {
        for (let i = 0; i < newFiles.length; i++) {
            if (newFiles[i].type.startsWith('image/')) {
                files.push(newFiles[i]);
            }
        }
        updateInputFiles();
        renderPreviews();
    }

    function updateInputFiles() {
        const dt = new DataTransfer();
        files.forEach(f => dt.items.add(f));
        input.files = dt.files;
    }

    function renderPreviews() {
        previewContainer.innerHTML = '';
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative rounded-xl overflow-hidden border border-white/10 bg-white/5 aspect-square group';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <button type="button" onclick="removeFile(${index})" class="absolute top-2 right-2 w-7 h-7 bg-red-500 text-white rounded-full flex items-center justify-center text-xs font-bold opacity-0 group-hover:opacity-100 transition-all cursor-pointer hover:bg-red-600">×</button>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                        <p class="text-white text-xs truncate">${file.name}</p>
                    </div>
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    window.removeFile = function(index) {
        files.splice(index, 1);
        updateInputFiles();
        renderPreviews();
    };
});
</script>
@endsection
