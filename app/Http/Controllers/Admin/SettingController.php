<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Setting::get('site_name', "BOBLO'S"),
            'contact_phone' => Setting::get('contact_phone', '0345 0845454'),
            'contact_email' => Setting::get('contact_email', 'info@fignolive.pk'),
            'contact_address' => Setting::get('contact_address', 'One Piccadilly, Business Square, Gulberg Greens, Islamabad, Pakistan'),
            'opening_hours' => Setting::get('opening_hours', 'Daily: 8:00 AM - 11:30 PM'),
            'facebook_url' => Setting::get('facebook_url', 'https://www.facebook.com/figandolive.pk/'),
            'instagram_url' => Setting::get('instagram_url', 'https://www.instagram.com/figandolive.pk/'),
            'whatsapp_url' => Setting::get('whatsapp_url', 'https://wa.me/923450845454'),
            'logo' => Setting::get('logo'),
            'favicon' => Setting::get('favicon'),
        ];

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_address' => 'required|string|max:500',
            'opening_hours' => 'required|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'whatsapp_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:40960',
            'favicon' => 'nullable|image|mimes:ico,png,gif,svg|max:1024',
        ]);

        $settings = $request->only([
            'site_name',
            'contact_phone',
            'contact_email',
            'contact_address',
            'opening_hours',
            'facebook_url',
            'instagram_url',
            'whatsapp_url',
        ]);

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        if ($request->hasFile('logo')) {
            $oldLogo = Setting::get('logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $logoPath = $request->file('logo')->store('settings', 'public');
            Setting::set('logo', $logoPath);
        }

        if ($request->hasFile('favicon')) {
            $oldFavicon = Setting::get('favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $faviconPath = $request->file('favicon')->store('settings', 'public');
            Setting::set('favicon', $faviconPath);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
