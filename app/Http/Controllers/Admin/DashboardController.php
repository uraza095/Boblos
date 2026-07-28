<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Reservation;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = MenuCategory::count();
        $itemsCount = MenuItem::count();
        $pagesCount = Page::count();
        $reservationsCount = Reservation::count();
        $testimonialsCount = Testimonial::count();
        $blogsCount = Blog::count();
        $contactsCount = ContactMessage::count();
        
        $recentItems = MenuItem::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'itemsCount',
            'pagesCount',
            'reservationsCount',
            'testimonialsCount',
            'blogsCount',
            'contactsCount',
            'recentItems'
        ));
    }
}
