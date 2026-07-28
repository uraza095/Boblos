@extends('admin.layout')

@section('title', 'Reservations')
@section('page_title', 'Table Booking Reservations')

@section('main_content')
<div class="space-y-6">
    <!-- Filters -->
    <form action="{{ route('admin.reservations.index') }}" method="GET" class="glass-card flex flex-wrap items-center gap-4 p-5 rounded-2xl">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-xs font-bold text-white/70 uppercase mb-1">Search Customer</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Name or phone..."
                class="w-full px-4 py-2.5 text-sm rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:bg-white/15 focus:border-white/30 focus:ring-1 focus:ring-white/20 transition-all">
        </div>

        <div>
            <label class="block text-xs font-bold text-white/70 uppercase mb-1">Filter Date</label>
            <input type="date" name="date" value="{{ request('date') }}"
                class="px-4 py-2.5 text-sm rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:bg-white/15 focus:border-white/30 focus:ring-1 focus:ring-white/20 transition-all [color-scheme:dark]">
        </div>

        <div>
            <label class="block text-xs font-bold text-white/70 uppercase mb-1">Status</label>
            <select name="status"
                class="px-4 py-2.5 text-sm rounded-xl bg-white/10 border border-white/20 text-white focus:outline-none focus:bg-white/15 focus:border-white/30 focus:ring-1 focus:ring-white/20 transition-all">
                <option value="" class="bg-[#2d0a14] text-white">All Statuses</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Pending</option>
                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Confirmed</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }} class="bg-[#2d0a14] text-white">Cancelled</option>
            </select>
        </div>

        <div class="self-end">
            <button type="submit" class="px-6 py-2.5 bg-[#ee7c8b] text-[#ee7c8b] font-bold text-sm rounded-xl hover:bg-opacity-90 transition-all cursor-pointer">
                Filter
            </button>
        </div>
    </form>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase font-semibold text-xs border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4">Customer Name</th>
                    <th class="px-6 py-4">Phone Number</th>
                    <th class="px-6 py-4">Guests</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Time Slot</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($reservations as $res)
                    <tr>
                        <td class="px-6 py-4 font-semibold text-brand">{{ $res->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $res->phone }}</td>
                        <td class="px-6 py-4 text-gray-600 font-bold">{{ $res->guests }} {{ Str::plural('Person', $res->guests) }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($res->date)->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $res->time }}</td>
                        <td class="px-6 py-4">
                            @if ($res->status === 'confirmed')
                                <span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-bold rounded-lg border border-green-100">Confirmed</span>
                            @elseif ($res->status === 'cancelled')
                                <span class="px-2.5 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100">Cancelled</span>
                            @else
                                <span class="px-2.5 py-1 bg-yellow-50 text-yellow-700 text-xs font-bold rounded-lg border border-yellow-100">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if ($res->status !== 'confirmed')
                                    <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="px-3 py-1.5 bg-green-50 text-green-700 text-xs font-bold rounded-lg border border-green-100 hover:bg-green-100 transition-all">
                                            Confirm
                                        </button>
                                    </form>
                                @endif
                                
                                @if ($res->status !== 'cancelled')
                                    <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 text-xs font-bold rounded-lg border border-red-100 hover:bg-red-100 transition-all">
                                            Cancel
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.reservations.destroy', $res) }}" method="POST" class="inline" onsubmit="return confirm('Delete this reservation record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 border border-gray-200 text-gray-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">No reservations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>{{ $reservations->links() }}</div>
</div>
@endsection
