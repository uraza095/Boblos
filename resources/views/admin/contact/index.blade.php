@extends('admin.layout')

@section('title', 'Inquiries Inbox')
@section('page_title', 'Contact Messages & Inquiries')

@section('main_content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <form action="{{ route('admin.contact.index') }}" method="GET" class="flex gap-3 max-w-sm w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search sender name or email..."
                class="flex-1 px-4 py-2.5 text-sm rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent">
            <button type="submit" class="px-5 py-2.5 bg-brand text-white font-semibold text-sm rounded-xl hover:bg-opacity-95 transition-all">
                Search
            </button>
        </form>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Sender</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Subject</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Received Date</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($messages as $msg)
                    <tr class="{{ $msg->status === 'unread' ? 'bg-brand-light/30 font-semibold' : '' }}">
                        <td class="px-6 py-4 text-brand">{{ $msg->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $msg->email }}</td>
                        <td class="px-6 py-4 text-gray-700 max-w-xs truncate">{{ $msg->subject ?? 'General Inquiry' }}</td>
                        <td class="px-6 py-4">
                            @if ($msg->status === 'unread')
                                <span class="px-2.5 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100">Unread</span>
                            @else
                                <span class="px-2.5 py-1 bg-gray-50 text-gray-400 text-xs font-semibold rounded-lg border border-gray-100">Read</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $msg->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.contact.show', $msg) }}" 
                                    class="px-3 py-1.5 border border-brand text-brand font-semibold text-xs rounded-xl hover:bg-brand hover:text-white transition-all">
                                    <i class="fa-solid fa-envelope-open mr-1"></i> Read
                                </a>
                                <form action="{{ route('admin.contact.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="p-2 border border-gray-200 text-gray-500 hover:text-red-700 hover:bg-red-50 rounded-xl transition-all"
                                        title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">Inbox is empty.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $messages->links() }}</div>
</div>
@endsection
