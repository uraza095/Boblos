<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemapPath = public_path('sitemap.xml');
        $exists = File::exists($sitemapPath);
        $lastModified = $exists ? date('Y-m-d H:i:s', File::lastModified($sitemapPath)) : 'Never';
        $fileSize = $exists ? round(File::size($sitemapPath) / 1024, 2) . ' KB' : 'N/A';

        return view('admin.sitemap.index', compact('exists', 'lastModified', 'fileSize'));
    }

    public function generate()
    {
        $appUrl = config('app.url', 'http://localhost');
        
        $urls = [];

        // Static routes/pages
        $staticSlugs = [
            'home' => '',
            'about' => 'about',
            'contact' => 'contact-us',
            'chefs' => 'our-chef',
            'gallery' => 'gallery',
            'testimonial' => 'testimonial',
            'book-table' => 'book-table',
            'blog.list' => 'blogs',
            'menu.list' => 'our-menu',
            'deals' => 'lunch-deals',
            'bar' => 'bar',
        ];

        foreach ($staticSlugs as $name => $path) {
            $urls[] = [
                'loc' => rtrim($appUrl, '/') . '/' . ltrim($path, '/'),
                'lastmod' => now()->toW3cString(),
                'changefreq' => 'weekly',
                'priority' => ($name === 'home') ? '1.0' : '0.8',
            ];
        }

        // Add Blog posts
        $blogs = Blog::where('status', 'published')->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => rtrim($appUrl, '/') . '/blogs/' . $blog->slug,
                'lastmod' => $blog->updated_at->toW3cString(),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ];
        }

        // Build XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($url['loc']) . "</loc>\n";
            $xml .= "        <lastmod>" . $url['lastmod'] . "</lastmod>\n";
            $xml .= "        <changefreq>" . $url['changefreq'] . "</changefreq>\n";
            $xml .= "        <priority>" . $url['priority'] . "</priority>\n";
            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        return redirect()->route('admin.sitemap.index')->with('success', 'Sitemap generated successfully!');
    }
}
