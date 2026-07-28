@extends('admin.layout')

@section('title', 'Sitemap Generator')
@section('page_title', 'Sitemap Generator')

@section('main_content')
<div class="space-y-6 max-w-4xl">
    <div class="glass-panel rounded-2xl p-8 shadow-sm">
        <h2 class="text-xl font-bold text-white mb-4">Sitemap Status & Details</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="p-6 rounded-xl border border-white/10 bg-white/5">
                <span class="text-xs text-white/50 block font-medium uppercase mb-1">Status</span>
                @if ($exists)
                    <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 rounded-lg text-sm font-semibold inline-block">
                        Active / Generated
                    </span>
                @else
                    <span class="px-3 py-1 bg-rose-500/20 text-rose-300 border border-rose-500/30 rounded-lg text-sm font-semibold inline-block">
                        Missing
                    </span>
                @endif
            </div>

            <div class="p-6 rounded-xl border border-white/10 bg-white/5">
                <span class="text-xs text-white/50 block font-medium uppercase mb-1">File Size</span>
                <span class="text-lg font-bold text-white">{{ $fileSize }}</span>
            </div>

            <div class="p-6 rounded-xl border border-white/10 bg-white/5">
                <span class="text-xs text-white/50 block font-medium uppercase mb-1">Last Updated</span>
                <span class="text-lg font-bold text-white">{{ $lastModified }}</span>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex items-center justify-between">
            <div class="text-sm text-white/60">
                <p>Generating the sitemap updates the <code>sitemap.xml</code> file located in your public directory.</p>
                <p class="text-xs text-white/40 mt-1">Sitemap URL: <a href="{{ url('sitemap.xml') }}" target="_blank" class="text-[#fce4e8] hover:underline">{{ url('sitemap.xml') }}</a></p>
            </div>
            
            <form action="{{ route('admin.sitemap.generate') }}" method="POST">
                @csrf
                <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Generate & Update Sitemap
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
