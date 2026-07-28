@extends('admin.layout')

@section('title', 'Read Message')
@section('page_title', 'Message from ' . $message->name)

@section('main_content')
<div class="w-full glass-panel rounded-2xl p-8 shadow-sm space-y-6">
    <div class="flex items-center justify-between border-b border-gray-100 pb-4">
        <div>
            <h4 class="text-xl font-bold text-brand">{{ $message->name }}</h4>
            <p class="text-sm text-gray-500">{{ $message->email }}</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-gray-400">Received On</p>
            <p class="text-sm font-semibold text-gray-600">{{ $message->created_at->format('M d, Y \a\t h:i A') }}</p>
        </div>
    </div>

    <div>
        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Subject</h5>
        <p class="text-base font-semibold text-brand">{{ $message->subject ?? 'General Inquiry' }}</p>
    </div>

    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
        <h5 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Message Body</h5>
        <p class="text-gray-700 text-sm leading-relaxed whitespace-pre-line">{{ $message->message }}</p>
    </div>

    <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
        <a href="mailto:{{ $message->email }}?subject=RE: {{ rawurlencode($message->subject ?? 'Your inquiry at BOBLO'S') }}" 
            class="px-5 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all flex items-center gap-1.5">
            <i class="fa-solid fa-reply"></i> Reply via Email
        </a>
        <a href="{{ route('admin.contact.index') }}" class="px-5 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-xl hover:bg-gray-50 transition-all">
            Back to Inbox
        </a>
    </div>
</div>
@endsection
