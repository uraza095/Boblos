@extends('admin.layout')

@section('title', '404 - Page Not Found')
@section('page_title', 'Page Not Found')

@section('main_content')
<div class="flex items-center justify-center py-12">
    <div class="glass-card rounded-2xl p-10 max-w-lg w-full text-center space-y-6 shadow-2xl border border-white/10">
        <div class="w-20 h-20 rounded-full bg-white/5 border border-white/15 flex items-center justify-center text-[#fce4e8] mx-auto animate-pulse">
            <i class="fa-solid fa-compass-drafting text-3xl"></i>
        </div>
        
        <div class="space-y-2">
            <h2 class="text-3xl font-extrabold text-white">Lost in Space?</h2>
            <p class="text-sm text-white/60">
                {{ $message ?? 'The page or resource you are looking for does not exist or has been moved.' }}
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4">
            <button onclick="window.history.back();" class="w-full sm:w-auto px-6 py-3 border border-white/20 bg-white/5 text-white font-semibold text-sm rounded-xl hover:bg-white/10 transition-all flex items-center justify-center gap-2 cursor-pointer">
                <i class="fa-solid fa-arrow-left"></i>
                Go Back
            </button>
            <a href="{{ route('admin.dashboard') }}" class="w-full sm:w-auto px-6 py-3 bg-[#fce4e8] text-[#ee7c8b] font-bold text-sm rounded-xl hover:bg-white transition-all flex items-center justify-center gap-2 cursor-pointer">
                <i class="fa-solid fa-house"></i>
                Admin Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
