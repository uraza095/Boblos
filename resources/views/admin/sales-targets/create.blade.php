@extends('admin.layout')

@section('title', 'Add Sales Target')
@section('page_title', 'Add Daily Sales')

@section('main_content')
<div class="glass-card rounded-2xl p-6 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-white">Add New Record</h2>
        <a href="{{ route('admin.sales-targets.index') }}" class="border border-white/20 bg-white/5 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-all hover:bg-white/10">
            <i class="fa-solid fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.sales-targets.store') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label class="form-label block mb-2">Date *</label>
            <input type="date" name="date" class="w-full" value="{{ old('date', date('Y-m-d')) }}" required>
            @error('date') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Section 1: Food Sale -->
            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <h3 class="text-[#fce4e8] font-bold mb-4 border-b border-white/10 pb-2">Food Sale</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="form-label block mb-2">Gross Sale</label>
                        <input type="number" step="0.01" name="food_gross_sale" id="food_gross_sale" class="w-full" value="{{ old('food_gross_sale', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2">Discounts (Pkr)</label>
                        <input type="number" step="0.01" name="food_discounts" id="food_discounts" class="w-full" value="{{ old('food_discounts', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2">Complimentary</label>
                        <input type="number" step="0.01" name="food_complimentary" id="food_complimentary" class="w-full" value="{{ old('food_complimentary', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2 text-[#fce4e8]">Net sale</label>
                        <input type="number" step="0.01" name="food_net_sale" id="food_net_sale" class="w-full" value="{{ old('food_net_sale', 0) }}">
                    </div>
                </div>
            </div>

            <!-- Section 2: Other Income -->
            <div class="bg-white/5 rounded-2xl p-5 border border-white/10">
                <h3 class="text-[#fce4e8] font-bold mb-4 border-b border-white/10 pb-2">Other Income</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="form-label block mb-2">Tax income</label>
                        <input type="number" step="0.01" name="other_tax_income" id="other_tax_income" class="w-full" value="{{ old('other_tax_income', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2">Service Charges</label>
                        <input type="number" step="0.01" name="other_service_charges" id="other_service_charges" class="w-full" value="{{ old('other_service_charges', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2">Decor Income</label>
                        <input type="number" step="0.01" name="other_decor_income" id="other_decor_income" class="w-full" value="{{ old('other_decor_income', 0) }}">
                    </div>
                    <div>
                        <label class="form-label block mb-2 text-[#fce4e8]">Total Sale</label>
                        <input type="number" step="0.01" name="other_total_sale" id="other_total_sale" class="w-full" value="{{ old('other_total_sale', 0) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.sales-targets.index') }}" class="border border-white/20 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-white/10">Cancel</a>
            <button type="submit" class="bg-brand text-white px-8 py-2.5 rounded-xl font-bold shadow-lg shadow-brand/20">Save Record</button>
        </div>
    </form>
</div>

<script>
    // Optional: Auto-calculate net sale and total sale
    document.addEventListener('DOMContentLoaded', function() {
        const foodInputs = ['food_gross_sale', 'food_discounts', 'food_complimentary'].map(id => document.getElementById(id));
        const foodNet = document.getElementById('food_net_sale');

        const calcFood = () => {
            const gross = parseFloat(foodInputs[0].value) || 0;
            const disc = parseFloat(foodInputs[1].value) || 0;
            const comp = parseFloat(foodInputs[2].value) || 0;
            foodNet.value = (gross - disc - comp).toFixed(2);
        };
        foodInputs.forEach(input => input?.addEventListener('input', calcFood));

        const otherInputs = ['other_tax_income', 'other_service_charges', 'other_decor_income'].map(id => document.getElementById(id));
        const otherTotal = document.getElementById('other_total_sale');

        const calcOther = () => {
            const tax = parseFloat(otherInputs[0].value) || 0;
            const svc = parseFloat(otherInputs[1].value) || 0;
            const decor = parseFloat(otherInputs[2].value) || 0;
            otherTotal.value = (tax + svc + decor).toFixed(2);
        };
        otherInputs.forEach(input => input?.addEventListener('input', calcOther));
    });
</script>
@endsection
