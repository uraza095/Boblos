<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SalesTargetController;
use App\Http\Controllers\Admin\GalleryController;
// Public Routes
Route::get('/', function () { 
    $categories = \App\Models\MenuCategory::where('status', 'active')
        ->where('show_on_homepage', true)
        ->orderBy('display_order')
        ->get();
    if ($categories->isEmpty()) {
        $categories = \App\Models\MenuCategory::where('status', 'active')
            ->orderBy('display_order')
            ->get();
    }

    $homeMenuCategories = \App\Models\MenuCategory::where('status', 'active')
        ->where('show_on_home_menu', true)
        ->with(['menuItems' => function ($q) {
            $q->where('status', 'available')->orderBy('display_order');
        }])
        ->orderBy('display_order')
        ->get();

    if ($homeMenuCategories->isEmpty()) {
        $homeMenuCategories = \App\Models\MenuCategory::where('status', 'active')
            ->with(['menuItems' => function ($q) {
                $q->where('status', 'available')->orderBy('display_order');
            }])
            ->orderBy('display_order')
            ->take(4)
            ->get();
    }

    $featuredItems = \App\Models\MenuItem::where('status', 'available')
        ->where('featured', true)
        ->orderBy('display_order')
        ->take(4)
        ->get();

    if ($featuredItems->isEmpty()) {
        $featuredItems = \App\Models\MenuItem::where('status', 'available')
            ->orderBy('display_order')
            ->take(4)
            ->get();
    }

    return view('index', compact('categories', 'homeMenuCategories', 'featuredItems'));
})->name('home');

Route::get('/about', function () { 
    return view('about');
})->name('about');

Route::get('/menu', function () { 
    $categories = \App\Models\MenuCategory::where('status', 'active')
        ->with(['menuItems' => function ($q) {
            $q->where('status', 'available')->orderBy('display_order');
        }])
        ->orderBy('display_order')
        ->get();
    return view('menu', compact('categories'));
})->name('menu');

Route::get('/blog', function () { 
    return view('blog');
})->name('blog');

Route::get('/blog-details', function () { 
    return view('blog-details');
})->name('blog.details');

Route::get('/contact', function () { 
    return view('contact');
})->name('contact');

Route::get('/cart', function () { 
    return view('cart');
})->name('cart');

Route::get('/checkout', function () { 
    return view('checkout');
})->name('checkout');

Route::get('/faq', function () { 
    return view('faq');
})->name('faq');

Route::get('/user-login', function () { 
    return view('login');
})->name('login');

Route::get('/404', function () { 
    return view('404');
})->name('404');


// Table Booking Submit
Route::post('/book-table', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'guests' => 'required|integer|min:1',
        'date' => 'required|string',
        'time' => 'required|string',
        'message' => 'nullable|string',
    ]);
    
    // Parse date if standard format DD-MM-YYYY is sent, otherwise keep raw
    $date = $request->date;
    try {
        $date = \Carbon\Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
    } catch (\Exception $e) {
        try {
            $date = \Carbon\Carbon::parse($request->date)->format('Y-m-d');
        } catch (\Exception $ex) {}
    }

    $reservation = \App\Models\Reservation::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'guests' => $request->guests,
        'date' => $date,
        'time' => $request->time,
        'status' => 'pending',
    ]);

    try {
        $recipient = config('mail.from.address') ?? env('MAIL_FROM_ADDRESS', 'contact@fignolive.pk');
        \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\ReservationMail($reservation));
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Reservation email failed to send: ' . $e->getMessage());
    }

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Your reservation request has been submitted successfully! We will confirm shortly.'
        ]);
    }

    return redirect()->back()->with('success', 'Your reservation request has been submitted successfully! We will confirm shortly.');
})->name('book-table.submit');

// Contact Form Submit
Route::post('/contact-us', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    $contactMessage = \App\Models\ContactMessage::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'status' => 'unread',
    ]);

    try {
        $recipient = config('mail.from.address') ?? env('MAIL_FROM_ADDRESS', 'contact@fignolive.pk');
        \Illuminate\Support\Facades\Mail::to($recipient)->send(new \App\Mail\ContactFormMail($contactMessage));
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Contact email failed to send: ' . $e->getMessage());
    }

    return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully.');
})->name('contact.submit');

// Newsletter Subscribe Route
Route::post('/newsletter-subscribe', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email|max:255',
    ]);
    return redirect()->back()->with('success_newsletter', 'Thank you for subscribing to our newsletter!');
})->name('newsletter.subscribe');

Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!\Illuminate\Support\Facades\File::exists($path)) {
        abort(404);
    }
    return response()->file($path, [
        'Content-Type' => 'application/xml'
    ]);
});

// Admin Panel Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Admin Authenticated Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Menu Categories CRUD
        Route::resource('categories', MenuCategoryController::class)->except(['show']);
        
        // Menu Items CRUD
        Route::resource('menu-items', MenuItemController::class);
        
        // Testimonials CRUD
        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        // Chefs CRUD
        Route::resource('chefs', ChefController::class)->except(['show']);

        // Reservations
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations-logs', [ReservationController::class, 'logs'])->name('reservations.logs');
        Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
        Route::patch('/reservations/{reservation}/status', [ReservationController::class, 'updateStatus'])->name('reservations.status');
        Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

        // Blogs CRUD
        Route::resource('blogs', BlogController::class)->except(['show']);

        // Contact Messages
        Route::get('/contact', [ContactMessageController::class, 'index'])->name('contact.index');
        Route::get('/contact/{message}', [ContactMessageController::class, 'show'])->name('contact.show');
        Route::delete('/contact/{message}', [ContactMessageController::class, 'destroy'])->name('contact.destroy');
        
        // Pages Content Manager
        Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
        Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
        Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
        Route::get('/pages/{page}/sections/{section}/edit', [PageController::class, 'editSection'])->name('pages.sections.edit');
        Route::put('/pages/{page}/sections/{section}', [PageController::class, 'updateSection'])->name('pages.sections.update');
        
        // Sitemap Manager
        Route::get('/sitemap', [\App\Http\Controllers\Admin\SitemapController::class, 'index'])->name('sitemap.index');
        Route::post('/sitemap/generate', [\App\Http\Controllers\Admin\SitemapController::class, 'generate'])->name('sitemap.generate');

        // General Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
        
        // Sales Targets
        Route::resource('sales-targets', SalesTargetController::class);

        // Gallery
        Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/gallery/{image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        Route::delete('/gallery-all', [GalleryController::class, 'destroyAll'])->name('gallery.destroyAll');
    });
});
