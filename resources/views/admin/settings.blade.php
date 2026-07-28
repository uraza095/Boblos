@extends('admin.layout')

@section('title', 'General Settings')
@section('page_title', 'General Settings')

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

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label for="site_name" class="block text-sm font-semibold text-body-dark mb-2">Site Name</label>
            <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name']) }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-body-dark mb-2">Logo</label>
                @if ($settings['logo'])
                    <div class="mb-3 p-3 rounded-xl inline-block">
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" class="h-10 object-contain">
                    </div>
                @endif
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-body-dark mb-2">Favicon</label>
                @if ($settings['favicon'])
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon" class="w-8 h-8 object-contain">
                    </div>
                @endif
                <input type="file" name="favicon" id="favicon" accept="image/*"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="contact_phone" class="block text-sm font-semibold text-body-dark mb-2">Contact Phone</label>
                <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>

            <div>
                <label for="contact_email" class="block text-sm font-semibold text-body-dark mb-2">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
            </div>
        </div>

        <div>
            <label for="contact_address" class="block text-sm font-semibold text-body-dark mb-2">Contact Address</label>
            <textarea name="contact_address" id="contact_address" rows="3" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">{{ old('contact_address', $settings['contact_address']) }}</textarea>
        </div>

        <div>
            <label for="opening_hours" class="block text-sm font-semibold text-body-dark mb-2">Opening Hours</label>
            <input type="text" name="opening_hours" id="opening_hours" value="{{ old('opening_hours', $settings['opening_hours']) }}" required
                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
        </div>

        <div class="space-y-4">
            <h4 class="text-sm font-bold text-brand uppercase tracking-wider border-b border-gray-100 pb-2">Social Media Settings</h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="facebook_url" class="block text-xs font-semibold text-body-dark mb-2">Facebook URL</label>
                    <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $settings['facebook_url']) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="instagram_url" class="block text-xs font-semibold text-body-dark mb-2">Instagram URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $settings['instagram_url']) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="whatsapp_url" class="block text-xs font-semibold text-body-dark mb-2">WhatsApp / Link URL</label>
                    <input type="url" name="whatsapp_url" id="whatsapp_url" value="{{ old('whatsapp_url', $settings['whatsapp_url']) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent text-sm">
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-6 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-brand text-white font-bold text-sm rounded-xl hover:bg-opacity-95 shadow-md shadow-brand/10 transition-all">
                Save General Settings
            </button>
        </div>
    </form>
</div>
@endsection
