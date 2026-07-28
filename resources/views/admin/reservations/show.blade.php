@extends('admin.layout')

@section('title', 'Reservation Details')
@section('page_title')
    Reservation #{{ $reservation->id }} Details
@endsection

@section('main_content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Action buttons at the top -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.reservations.index') }}" class="px-5 py-2.5 border border-white/20 bg-white/5 text-white font-semibold text-sm rounded-xl hover:bg-[#fce4e8] hover:text-[#ee7c8b] transition-all flex items-center gap-2 cursor-pointer">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Reservations
        </a>
    </div>

    <!-- Main Details Card -->
    <div class="glass-card rounded-2xl p-8 space-y-8 shadow-lg border border-white/10">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-white/10 pb-6">
            <div>
                <p class="text-xs text-white/50 uppercase tracking-wider font-bold">Customer Name</p>
                <h2 class="text-2xl font-extrabold text-[#fce4e8] mt-1">{{ $reservation->name }}</h2>
            </div>
            <div>
                <p class="text-xs text-white/50 uppercase tracking-wider font-bold text-right">Status</p>
                <div class="mt-2 text-right">
                    @if ($reservation->status === 'confirmed')
                        <span class="px-3.5 py-1.5 bg-green-50 text-green-700 text-xs font-extrabold rounded-lg border border-green-100">Confirmed</span>
                    @elseif ($reservation->status === 'cancelled')
                        <span class="px-3.5 py-1.5 bg-red-50 text-red-600 text-xs font-extrabold rounded-lg border border-red-100">Cancelled</span>
                    @else
                        <span class="px-3.5 py-1.5 bg-yellow-50 text-yellow-700 text-xs font-extrabold rounded-lg border border-yellow-100">Pending Confirmation</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-[#fce4e8] shrink-0">
                        <i class="fa-solid fa-phone text-lg"></i>
                    </div>
                    <div>
                        <p class="text-xs text-white/50 uppercase tracking-wider font-semibold">Phone Number</p>
                        <p class="text-base text-white font-bold mt-1">{{ $reservation->phone }}</p>
                        <a href="tel:{{ $reservation->phone }}" class="text-xs text-[#fce4e8] hover:underline mt-1 inline-block">
                            <i class="fa-solid fa-phone-volume mr-1"></i> Call Customer
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-[#fce4e8] shrink-0">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>
                    <div>
                        <p class="text-xs text-white/50 uppercase tracking-wider font-semibold">Party Size</p>
                        <p class="text-base text-white font-bold mt-1">
                            {{ $reservation->guests }} {{ Str::plural('Person', $reservation->guests) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-[#fce4e8] shrink-0">
                        <i class="fa-solid fa-calendar text-lg"></i>
                    </div>
                    <div>
                        <p class="text-xs text-white/50 uppercase tracking-wider font-semibold">Reservation Date</p>
                        <p class="text-base text-white font-bold mt-1">
                            {{ \Carbon\Carbon::parse($reservation->date)->format('F d, Y') }}
                            <span class="text-xs font-normal text-white/60">({{ \Carbon\Carbon::parse($reservation->date)->format('l') }})</span>
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-[#fce4e8] shrink-0">
                        <i class="fa-solid fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-xs text-white/50 uppercase tracking-wider font-semibold">Time Slot</p>
                        <p class="text-base text-white font-bold mt-1">{{ $reservation->time }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Footer / Action Form -->
        <div class="border-t border-white/10 pt-6 flex flex-wrap items-center justify-between gap-4">
            <div class="text-xs text-white/40">
                Created on {{ $reservation->created_at->format('M d, Y \a\t h:i A') }}
            </div>
            
            <div class="flex items-center gap-3">
                @if ($reservation->status !== 'confirmed')
                    <form action="{{ route('admin.reservations.status', $reservation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="confirmed">
                        <button type="submit" class="px-5 py-2.5 bg-green-600 hover:bg-green-500 text-white font-bold text-sm rounded-xl transition-all cursor-pointer shadow-sm">
                            <i class="fa-solid fa-check mr-2"></i> Confirm Reservation
                        </button>
                    </form>
                @endif
                
                @if ($reservation->status !== 'cancelled')
                    <form action="{{ route('admin.reservations.status', $reservation) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="px-5 py-2.5 bg-red-600/20 border border-red-500/30 text-red-200 hover:bg-red-600 hover:text-white font-bold text-sm rounded-xl transition-all cursor-pointer shadow-sm">
                            <i class="fa-solid fa-xmark mr-2"></i> Cancel Reservation
                        </button>
                    </form>
                @endif

                <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" class="inline" onsubmit="return confirm('Delete this reservation record? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2.5 bg-transparent border border-red-600 text-red-500 hover:bg-red-600 hover:text-white font-bold text-sm rounded-xl transition-all cursor-pointer shadow-sm" title="Delete">
                        <i class="fa-solid fa-trash-can mr-2"></i> Delete Record
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
