@extends('admin.layout')

@section('title', 'Reservation Activity Logs')
@section('page_title', 'Reservation Activity Logs')

@section('main_content')
<div class="space-y-6">
    <!-- Back & Info Header -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.reservations.index') }}" class="px-5 py-2.5 border border-white/20 bg-white/5 text-white font-semibold text-sm rounded-xl hover:bg-[#fce4e8] hover:text-[#ee7c8b] transition-all flex items-center gap-2 cursor-pointer">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Reservations
        </a>
        <div class="text-xs text-white/50 bg-white/5 border border-white/10 px-4 py-2 rounded-xl">
            <i class="fa-solid fa-shield-halved mr-1 text-[#fce4e8]"></i> Immutable Audit Logs
        </div>
    </div>

    <!-- Filters -->
    <form action="{{ route('admin.reservations.logs') }}" method="GET" class="glass-card flex flex-wrap items-center gap-4 p-5 rounded-2xl">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-xs font-bold text-white/70 uppercase mb-1">Search Logs</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Name, details, performed by..."
                class="w-full px-4 py-2.5 text-sm rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:bg-white/15 focus:border-white/30 focus:ring-1 focus:ring-white/20 transition-all">
        </div>

        <div>
            <label class="block text-xs font-bold text-white/70 uppercase mb-1">Action Type</label>
            <select name="action"
                class="px-4 py-2.5 text-sm rounded-xl bg-white/10 border border-white/20 text-white focus:outline-none focus:bg-white/15 focus:border-white/30 focus:ring-1 focus:ring-white/20 transition-all">
                <option value="" class="bg-[#2d0a14] text-white">All Actions</option>
                <option value="created" {{ request('action') === 'created' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Created</option>
                <option value="status_updated" {{ request('action') === 'status_updated' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Status Updated</option>
                <option value="deleted" {{ request('action') === 'deleted' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Deleted</option>
            </select>
        </div>

        <div class="self-end">
            <button type="submit" class="px-6 py-2.5 bg-[#ee7c8b] text-[#ee7c8b] font-bold text-sm rounded-xl hover:bg-opacity-90 transition-all cursor-pointer">
                Filter Logs
            </button>
        </div>
    </form>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Timestamp</th>
                    <th class="px-6 py-4">Action</th>
                    <th class="px-6 py-4">Reservation</th>
                    <th class="px-6 py-4">Log Details</th>
                    <th class="px-6 py-4">Performed By</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($logs as $log)
                    <tr>
                        <td class="px-6 py-4 text-gray-400 whitespace-nowrap">
                            {{ $log->created_at->format('M d, Y H:i:s') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($log->action === 'created')
                                <span class="px-2.5 py-1 bg-blue-50/10 text-blue-400 text-xs font-bold rounded-lg border border-blue-400/20">Created</span>
                            @elseif ($log->action === 'status_updated')
                                <span class="px-2.5 py-1 bg-yellow-50/10 text-yellow-400 text-xs font-bold rounded-lg border border-yellow-400/20">Status Updated</span>
                            @elseif ($log->action === 'deleted')
                                <span class="px-2.5 py-1 bg-red-50/10 text-red-400 text-xs font-bold rounded-lg border border-red-400/20">Deleted</span>
                            @else
                                <span class="px-2.5 py-1 bg-gray-50/10 text-gray-400 text-xs font-bold rounded-lg border border-gray-400/20">{{ ucfirst($log->action) }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-brand">
                            @if ($log->reservation_id)
                                <a href="{{ route('admin.reservations.show', $log->reservation_id) }}" class="text-[#fce4e8] hover:underline flex items-center gap-1.5">
                                    <i class="fa-solid fa-link text-xs opacity-70"></i>
                                    {{ $log->reservation_name ?? 'Reservation #'.$log->reservation_id }}
                                </a>
                            @else
                                <span class="text-white/40 flex items-center gap-1.5" title="This reservation record was deleted">
                                    <i class="fa-solid fa-trash-can text-xs opacity-50"></i>
                                    {{ $log->reservation_name ?? 'N/A' }} 
                                    <span class="text-[10px] uppercase font-bold tracking-wider px-1 bg-red-500/20 text-red-300 rounded border border-red-500/20 ml-1">Deleted</span>
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-white/80">
                            {{ $log->details }}
                        </td>
                        <td class="px-6 py-4 text-gray-300 font-semibold whitespace-nowrap">
                            <span class="inline-flex items-center gap-1">
                                <i class="fa-solid fa-user text-[10px] opacity-75 text-[#fce4e8]"></i>
                                {{ $log->performed_by }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No activity logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $logs->links() }}</div>
</div>
@endsection
