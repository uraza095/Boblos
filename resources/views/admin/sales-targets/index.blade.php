@extends('admin.layout')

@section('title', 'Sales Targets')
@section('page_title', 'Sales Targets')

@section('main_content')
<div class="glass-card rounded-2xl p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-white">Daily Sales Records</h2>
        <a href="{{ route('admin.sales-targets.create') }}" class="bg-brand text-white px-4 py-2 rounded-xl text-sm font-semibold transition-all">
            <i class="fa-solid fa-plus mr-2"></i> Add Daily Sale
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm whitespace-nowrap">
            <thead>
                <tr>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Net Food Sale</th>
                    <th class="px-4 py-3">Total Other Income</th>
                    <th class="px-4 py-3">Grand Total</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salesTargets as $target)
                    <tr>
                        <td class="px-4 py-3 font-semibold text-white">{{ \Carbon\Carbon::parse($target->date)->format('M d, Y') }}</td>
                        <td class="px-4 py-3">Rs. {{ number_format($target->food_net_sale, 2) }}</td>
                        <td class="px-4 py-3">Rs. {{ number_format($target->other_total_sale, 2) }}</td>
                        <td class="px-4 py-3 text-[#fce4e8] font-bold">Rs. {{ number_format($target->food_net_sale + $target->other_total_sale, 2) }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.sales-targets.edit', $target->id) }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.sales-targets.destroy', $target->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-white/50 font-medium">
                            No sales records found. Add one to get started.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
