<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | BOBLO'S Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts for premium feel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Quill WYSIWYG Editor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet" />
    <!-- Quill JS -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const textareas = document.querySelectorAll('textarea.wysiwyg');
            textareas.forEach(textarea => {
                const container = document.createElement('div');
                container.style.height = '220px';
                container.innerHTML = textarea.value;
                textarea.parentNode.insertBefore(container, textarea);
                textarea.style.display = 'none';

                const quill = new Quill(container, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['clean']
                        ]
                    }
                });

                const form = textarea.closest('form');
                if (form) {
                    form.addEventListener('submit', function() {
                        textarea.value = quill.root.innerHTML;
                    });
                }
            });
        });
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(rgba(45, 14, 24, 0.85), rgba(28, 7, 15, 0.90)), url("{{ asset('assets/images/dash_bg.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(238, 124, 139, 0.25);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(238, 124, 139, 0.45);
        }
        /* Micro-animations */
        .sidebar-link {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-link.active {
            background: linear-gradient(to right, rgb(255 255 255 / 2%) 33%, rgb(255 255 255 / 38%) 67%);
            color: #ffffff !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2) !important;
        }
        .sidebar-link:hover {
            transform: translateX(4px);
        }
        .sidebar-section-header {
            color: #fce4e8 !important;
            opacity: 0.8;
            font-size: 10px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            display: block !important;
            margin-top: 1.5rem !important;
            margin-bottom: 0.5rem !important;
        }
        .sidebar-section-header.first {
            margin-top: 0.5rem !important;
        }
        .glass-card, .glass-panel {
            background: rgb(255 255 255 / 0%) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2) !important;
        }
        .metric-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .metric-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -8px rgba(0, 0, 0, 0.05);
        }
        
        /* Force top header icons to white and inputs border */
        header button i, header .flex button i, header .relative span i, header .fa-magnifying-glass {
            color: #ffffff !important;
        }
        header input {
            border: 1.5px solid rgba(255, 255, 255, 0.4) !important;
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
        }
        header input::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        /* Layout borders to white/translucent */
        aside {
            border-right: 1.5px solid rgba(255, 255, 255, 0.15) !important;
        }
        header {
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.15) !important;
        }
        
        /* Breadcrumbs white color */
        main .flex.items-center.gap-2 span,
        main .flex.items-center.gap-2 a,
        main .flex.items-center.gap-2 i,
        .text-white\/50,
        .text-gray-400 {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Force admin form labels, section titles, headings, and body-dark to white */
        label, 
        .text-body-dark,
        .glass-panel label,
        .glass-card label,
        .glass-panel h3,
        .glass-card h3 {
            color: #ffffff !important;
        }
        .text-white\/50 i {
            color: rgba(255, 255, 255, 0.75) !important;
        }
        main .flex.items-center.gap-2 span.font-semibold,
        .text-white\/50 span.font-semibold {
            color: #fce4e8 !important;
        }

        /* Force table badges to high-contrast brand pink styling */
        main table span.bg-gray-50,
        main table span.bg-gray-100 {
            background-color: #2d0a14 !important;
            color: #ee7c8b !important;
            border: 1px solid rgba(238, 124, 139, 0.4) !important;
        }

        /* Creative Glass Action Buttons in Table Rows (Bulletproof Overrides) */
        td a:has(i.fa-pen-to-square),
        td a:has(i.fa-edit),
        td a:has(i.fa-pencil),
        td a[href*="edit"],
        td a[title="Edit"] {
            background-color: rgba(238, 124, 139, 0.25) !important;
            border: 1.5px solid #ee7c8b !important;
            border-radius: 12px !important;
            padding: 8px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s ease !important;
        }
        td a:has(i.fa-pen-to-square):hover,
        td a:has(i.fa-edit):hover,
        td a:has(i.fa-pencil):hover,
        td a[href*="edit"]:hover,
        td a[title="Edit"]:hover {
            background-color: #ee7c8b !important;
            border-color: #ee7c8b !important;
            transform: scale(1.08);
        }
        td a:has(i.fa-pen-to-square) i,
        td a:has(i.fa-edit) i,
        td a:has(i.fa-pencil) i,
        td a[href*="edit"] i,
        td a[title="Edit"] i {
            color: #fce4e8 !important; /* Elegant brand gold/cream contrast on green */
        }
        td a:has(i.fa-pen-to-square):hover i,
        td a:has(i.fa-edit):hover i,
        td a:has(i.fa-pencil):hover i,
        td a[href*="edit"]:hover i,
        td a[title="Edit"]:hover i {
            color: #ffffff !important;
        }

        /* Generic table cell button targets to guarantee delete styling updates */
        td button,
        td form button,
        td button[type="submit"],
        td button[title="Delete"],
        td button:has(i.fa-trash-can),
        td button:has(i.fa-trash) {
            background-color: rgba(239, 68, 68, 0.15) !important;
            border: 1.5px solid rgba(239, 68, 68, 0.35) !important;
            border-radius: 12px !important;
            padding: 8px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s ease !important;
            cursor: pointer !important;
        }
        td button:hover,
        td form button:hover,
        td button[type="submit"]:hover,
        td button[title="Delete"]:hover,
        td button:has(i.fa-trash-can):hover,
        td button:has(i.fa-trash):hover {
            background-color: #ef4444 !important;
            border-color: #ef4444 !important;
            transform: scale(1.08);
        }
        td button i,
        td form button i,
        td button[type="submit"] i,
        td button[title="Delete"] i,
        td button:has(i.fa-trash-can) i,
        td button:has(i.fa-trash) i {
            color: #ef4444 !important;
        }
        td button:hover i,
        td form button:hover i,
        td button[type="submit"]:hover i,
        td button[title="Delete"]:hover i,
        td button:has(i.fa-trash-can):hover i,
        td button:has(i.fa-trash):hover i {
            color: #ffffff !important;
        }

        /* Translucent white glass badges for notifications */
        header button span.absolute {
            background-color: rgba(255, 0, 0, 1) !important;
            color: #ffffff !important;
            border: 1.5px solid rgba(255, 255, 255, 0.4) !important;
            position: absolute;
            top: 5px;
            right: 5px;
        }

        /* Glass Form Elements styling (Supports all fields across admin pages) */
        main form input:not([type="checkbox"]):not([type="radio"]):not([type="file"]),
        main form textarea,
        main form select {
            background-color: rgba(255, 255, 255, 0.08) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            border-radius: 12px !important;
            padding: 10px 14px !important;
        }
        
        /* Custom Dropzone Styles */
        .custom-dropzone {
            display: flex !important;
            align-items: center !important;
            gap: 20px !important;
            padding: 16px 20px !important;
            border: 1.5px dashed rgba(255, 255, 255, 0.25) !important;
            border-radius: 12px !important;
            background: rgba(255, 255, 255, 0.03) !important;
            cursor: pointer !important;
            transition: all 0.25s ease !important;
            position: relative !important;
            margin-bottom: 12px !important;
            width: 100% !important;
            height: auto !important;
            flex-direction: row !important;
            justify-content: flex-start !important;
        }
        .custom-dropzone:hover {
            border-color: #fce4e8 !important;
            background-color: rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.15) !important;
        }
        main form select option {
            background-color: #ee7c8b !important;
            color: #ffffff !important;
        }
        
        /* High-end glass status badges */
        span.bg-brand-light,
        main span.bg-brand-light {
            background-color: transparent !important;
            color: #fce4e8 !important;
            border: 1.5px solid #fce4e8 !important;
            border-radius: 8px !important;
            font-weight: 700 !important;
        }
        span.bg-red-50,
        main span.bg-red-50 {
            background-color: rgba(239, 68, 68, 0.15) !important;
            color: #ef4444 !important;
            border: 1px solid rgba(239, 68, 68, 0.35) !important;
            border-radius: 8px !important;
            font-weight: 700 !important;
        }
        main form input::placeholder,
        main form textarea::placeholder {
            color: rgba(255, 255, 255, 0.55) !important;
        }
        
        /* High-visibility labels and details text */
        main label,
        main .form-label,
        main form label,
        main .text-gray-700,
        main .text-gray-600,
        main .text-slate-700,
        main .text-slate-600,
        main .text-brand {
            color: #ffffff !important;
            font-weight: 600 !important;
        }
        
        /* Muted description and helper descriptions */
        main .text-gray-500,
        main .text-slate-500,
        main .text-muted,
        main p.mt-1,
        main p.mt-2,
        main p.text-xs,
        main p.text-sm {
            color: rgba(255, 255, 255, 0.65) !important;
        }
        
        /* Translucent Cancel and Secondary buttons styling */
        main a[class*="border"],
        main button[class*="border"],
        main form a[href*="index"],
        main form a.border-gray-300,
        main form button.bg-gray-100 {
            border: 1.5px solid rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.05) !important;
            border-radius: 12px !important;
            padding: 10px 20px !important;
            font-weight: 600 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s ease !important;
        }
        main a[class*="border"]:hover,
        main button[class*="border"]:hover,
        main form a[href*="index"]:hover,
        main form a.border-gray-300:hover,
        main form a[class*="border"]:hover {
            background-color: #fce4e8 !important;
            color: #ee7c8b !important;
            border-color: #fce4e8 !important;
            text-decoration: none !important;
        }
        main a[class*="border"]:hover *,
        main button[class*="border"]:hover *,
        main a[class*="border"]:hover i,
        main button[class*="border"]:hover i {
            color: #ee7c8b !important;
            text-decoration: none !important;
        }
        main form:not(td form) button[type="submit"],
        main form a.bg-brand,
        main a.bg-brand {
            background-color: #fce4e8 !important;
            color: #ee7c8b !important;
            font-weight: 700 !important;
            border: none !important;
        }
        main form:not(td form) button[type="submit"]:hover,
        main form a.bg-brand:hover,
        main a.bg-brand:hover {
            background-color: #ffffff !important;
            color: #ee7c8b !important;
            text-decoration: none !important;
        }
        main form:not(td form) button[type="submit"]:hover *,
        main form a.bg-brand:hover *,
        main a.bg-brand:hover *,
        main form:not(td form) button[type="submit"]:hover i,
        main form a.bg-brand:hover i,
        main a.bg-brand:hover i {
            color: #ee7c8b !important;
            text-decoration: none !important;
        }

        /* Transparent Table system overrides */
        .glass-card table {
            background: transparent !important;
        }
        .glass-card table thead {
            background-color: rgba(238, 124, 139, 0.25) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        .glass-card table thead th {
            color: #fce4e8 !important;
            font-weight: 700 !important;
        }
        .glass-card table tbody tr {
            background-color: transparent !important;
            transition: background-color 0.2s ease;
        }
        .glass-card table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }
        .glass-card table tbody td {
            color: #ffffff !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        }
        .glass-card table tbody td a {
            color: #fce4e8 !important;
        }
        .glass-card table tbody td a:hover {
            text-decoration: underline !important;
        }

        /* Transparent Pagination system */
        main nav, .glass-card nav {
            background: transparent !important;
            border: none !important;
        }
        main nav *, .glass-card nav * {
            background-color: transparent !important;
            box-shadow: none !important;
        }
        main nav a, 
        main nav span.relative.inline-flex,
        main nav a.relative.inline-flex {
            background-color: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            margin: 0 4px !important;
            border-radius: 8px !important;
            padding: 6px 12px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s ease !important;
            height: 38px !important;
            min-width: 38px !important;
        }
        main nav a:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: #fce4e8 !important;
        }
        main nav span[aria-current="page"] span.relative.inline-flex,
        main nav span[aria-current="page"] span,
        main nav .active {
            background-color: #fce4e8 !important;
            color: #ee7c8b !important;
            border-color: #fce4e8 !important;
            font-weight: 700 !important;
        }
        main nav span[aria-disabled="true"] span.relative.inline-flex,
        main nav span[aria-disabled="true"] span {
            background-color: rgba(255, 255, 255, 0.04) !important;
            color: rgba(255, 255, 255, 0.4) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            cursor: not-allowed !important;
        }
        main nav svg {
            color: currentColor !important;
            fill: currentColor !important;
            width: 1.25rem !important;
            height: 1.25rem !important;
        }

        /* Quill Editor glass theme overrides */
        .ql-container {
            border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
            border-top: none !important;
            background-color: rgba(255, 255, 255, 0.08) !important;
            border-bottom-left-radius: 12px !important;
            border-bottom-right-radius: 12px !important;
        }
        .ql-toolbar {
            border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
            background-color: rgba(255, 255, 255, 0.04) !important;
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
            color: #ffffff !important;
        }
        .ql-editor,
        .ql-editor p,
        .ql-editor span,
        .ql-editor h1,
        .ql-editor h2,
        .ql-editor h3,
        .ql-editor li {
            color: #ffffff !important;
            font-family: inherit !important;
            font-size: 14px !important;
        }
        .ql-toolbar button,
        .ql-toolbar .ql-picker,
        .ql-toolbar .ql-stroke,
        .ql-toolbar .ql-fill {
            stroke: #ffffff !important;
            color: #ffffff !important;
        }
        .ql-toolbar .ql-stroke {
            stroke: #ffffff !important;
        }
        .ql-toolbar .ql-fill {
            fill: #ffffff !important;
        }
        .ql-toolbar .ql-picker-label {
            color: #ffffff !important;
        }
        .ql-toolbar .ql-picker-options {
            background-color: #ee7c8b !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
        }
        .ql-toolbar .ql-picker-item {
            color: #ffffff !important;
        }
        .ql-toolbar .ql-picker-item:hover,
        .ql-toolbar .ql-picker-item.ql-selected {
            color: #fce4e8 !important;
        }

        /* Glass Tag Badge design */
        main span.bg-gray-100.text-gray-600,
        main .flex.flex-wrap.gap-1 span {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #fce4e8 !important;
            border: 1px solid rgba(238, 223, 196, 0.35) !important;
            padding: 4px 10px !important;
            border-radius: 8px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            display: inline-block !important;
        }

        /* Glass Inactive/No badge design */
        main span.bg-gray-100.text-gray-500 {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: rgba(255, 255, 255, 0.5) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            padding: 4px 10px !important;
            border-radius: 8px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            display: inline-block !important;
        }

        /* Glass Red/Failed/Inactive status badge design */
        main span.bg-red-50.text-red-600 {
            background-color: rgba(239, 68, 68, 0.08) !important;
            color: #f87171 !important;
            border: 1px solid rgba(239, 68, 68, 0.25) !important;
            padding: 4px 10px !important;
            border-radius: 8px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            display: inline-block !important;
        }
    </style>
</head>
<body class="text-slate-800 antialiased overflow-x-hidden">
    <div class="min-h-screen flex" style="backdrop-filter: blur(10px) !important;">
        <!-- Sidebar: Sticky sidebar layout with scrollable navigation list -->
        <aside class="w-68 bg-[#ee7c8b]/20 backdrop-blur-xl border-r border-white/5 flex flex-col h-screen sticky top-0 shrink-0 z-10 shadow-lg">
            <div class="p-6 flex-1 overflow-y-auto">
                <!-- Brand logo -->
                <div class="flex items-center gap-3 mb-8 px-2">
                    <img src="{{ asset('assets/images/Logo_pink.png') }}" class="h-10 w-auto object-contain" alt="BOBLO'S Logo">
                </div>

                <nav class="space-y-1.5">
                    <span class="sidebar-section-header first">Main Menu</span>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-chart-pie text-base"></i>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.categories.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-tags text-base"></i>
                        Menu Categories
                    </a>
                    
                    <a href="{{ route('admin.menu-items.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.menu-items.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-utensils text-base"></i>
                        Menu Items
                    </a>

                    <span class="sidebar-section-header">Modules</span>

                    <a href="{{ route('admin.testimonials.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.testimonials.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-star text-base"></i>
                        Testimonials
                    </a>
                    
                    <a href="{{ route('admin.chefs.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.chefs.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-user-ninja text-base"></i>
                        Chefs
                    </a>
                    
                    <a href="{{ route('admin.reservations.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ (request()->routeIs('admin.reservations.index') || request()->routeIs('admin.reservations.show')) ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-calendar-check text-base"></i>
                        Reservations
                    </a>
                    
                    <a href="{{ route('admin.reservations.logs') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.reservations.logs') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-clock-rotate-left text-base"></i>
                        Reservation Logs
                    </a>
                    
                    <a href="{{ route('admin.blogs.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.blogs.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-book-open text-base"></i>
                        Blogs
                    </a>
                    
                    <a href="{{ route('admin.contact.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.contact.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-inbox text-base"></i>
                        Contact Inbox
                    </a>

                    <a href="{{ route('admin.gallery.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.gallery.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-images text-base"></i>
                        Gallery
                    </a>

                    <span class="sidebar-section-header">Controls</span>

                    <a href="{{ route('admin.pages.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.pages.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-file-lines text-base"></i>
                        Pages Content
                    </a>
                    
                    <a href="{{ route('admin.settings.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.settings.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-sliders text-base"></i>
                        General Settings
                    </a>

                    <a href="{{ route('admin.sitemap.index') }}" 
                        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.sitemap.*') ? 'active' : 'text-white hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-sitemap text-base"></i>
                        Sitemap Generator
                    </a>
                </nav>
            </div>
            
            <!-- Sidebar Footer: Pinned at the bottom -->
            <div class="p-6 border-t border-white/5 bg-black/20 shrink-0">
                <div class="flex items-center gap-3 mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ee7c8b&color=ffffff&bold=true" class="w-10 h-10 rounded-xl" alt="avatar">
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-[#fce4e8] truncate">Administrator</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="w-full py-2.5 px-4 rounded-xl border border-[#ee7c8b]/40 bg-[#ee7c8b]/20 text-white hover:bg-red-900/40 hover:text-red-200 transition-all text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Header with translucent glass effect -->
            <header class="h-20 bg-white/10 backdrop-blur-md border-b border-white/10 flex items-center justify-between px-8 shrink-0">
                <!-- Search bar -->
                <div class="relative w-80">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-white/60">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    </span>
                    <input type="text" placeholder="Search..." class="w-full py-2.5 pl-11 pr-4 bg-white/15 border border-white/10 rounded-2xl text-sm text-white placeholder-white/60 focus:outline-none focus:bg-white/20 transition-all shadow-sm">
                </div>

                <!-- Right Header Actions -->
                <div class="flex items-center gap-6">
                    <!-- Quick icons -->
                    <div class="flex items-center gap-2">
                        <button class="w-10 h-10 rounded-2xl hover:bg-white/20 flex items-center justify-center text-white/90 cursor-pointer">
                            <i class="fa-solid fa-expand text-sm"></i>
                        </button>
                        <button class="w-10 h-10 rounded-2xl hover:bg-white/20 flex items-center justify-center text-white/90 relative cursor-pointer">
                            <i class="fa-solid fa-bell text-sm"></i>
                            <span class="absolute top-2 right-2 w-4 h-4 bg-[#fce4e8] text-[9px] font-bold text-[#ee7c8b] rounded-full flex items-center justify-center border-2 border-white/15">5</span>
                        </button>
                        <button class="w-10 h-10 rounded-2xl hover:bg-white/20 flex items-center justify-center text-white/90 relative cursor-pointer">
                            <i class="fa-solid fa-envelope text-sm"></i>
                            <span class="absolute top-2 right-2 w-4 h-4 bg-[#fce4e8] text-[9px] font-bold text-[#ee7c8b] rounded-full flex items-center justify-center border-2 border-white/15">5</span>
                        </button>
                        <button class="w-10 h-10 rounded-2xl hover:bg-white/20 flex items-center justify-center text-white/90 cursor-pointer">
                            <i class="fa-solid fa-gear text-sm"></i>
                        </button>
                    </div>

                    <!-- Border separator -->
                    <span class="w-px h-6 bg-white/20"></span>

                    <!-- Welcome greeting -->
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <span class="text-xs text-white/60 block font-medium">Hello,</span>
                            <span class="text-sm font-bold text-white">{{ Auth::user()->name }}</span>
                        </div>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ee7c8b&color=ffffff&bold=true" class="w-10 h-10 rounded-full border border-white/20" alt="avatar">
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-8 overflow-y-auto bg-transparent">
                <!-- Breadcrumbs -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-extrabold text-white">@yield('page_title')</h1>
                        <div class="flex items-center gap-2 mt-1.5 text-xs text-white/50">
                            <span>Backend</span>
                            <i class="fa-solid fa-chevron-right text-[9px] text-white/40"></i>
                            <span class="font-semibold text-[#fce4e8]">@yield('page_title')</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('home') }}" target="_blank" 
                            class="text-xs font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 px-5 py-2.5 rounded-xl transition-all flex items-center gap-2 shadow-sm cursor-pointer">
                            <i class="fa-solid fa-arrow-up-right-from-square text-white"></i>
                            View Live Website
                        </a>
                    </div>
                </div>

                <!-- Alerts -->
                @if (session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 flex items-center gap-3 text-sm animate-fade-in shadow-sm">
                        <i class="fa-solid fa-circle-check text-lg"></i>
                        <div class="font-medium">{{ session('success') }}</div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 bg-rose-50 text-rose-700 rounded-2xl border border-rose-100 flex items-center gap-3 text-sm animate-fade-in shadow-sm">
                        <i class="fa-solid fa-circle-exclamation text-lg"></i>
                        <div class="font-medium">{{ session('error') }}</div>
                    </div>
                @endif

                @yield('main_content')
            </main>
        </div>
    </div>
    
    <!-- Image Upload Drag-and-Drop and Preview Handler Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInputs = document.querySelectorAll('main form input[type="file"]');
            fileInputs.forEach(input => {
                if (input.classList.contains('skip-dropzone')) return;
                // Hide actual native input element
                input.style.display = 'none';
                
                // Create custom styled dropzone container
                const dropzone = document.createElement('div');
                dropzone.className = 'custom-dropzone';
                
                // Add contents to custom dropzone container
                dropzone.innerHTML = `
                    <div class="dropzone-preview-box" style="width: 70px; height: 70px; border-radius: 10px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; position: relative; transition: all 0.25s ease;">
                        <i class="fa-solid fa-cloud-arrow-up text-[#fce4e8] text-xl upload-icon" style="transition: all 0.2s ease;"></i>
                        <img class="upload-preview-img" style="display: none; width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; border-radius: 8px;">
                        <span class="remove-upload-btn" style="position: absolute; top: 2px; right: 2px; background: #ef4444; color: #ffffff; width: 18px; height: 18px; border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; cursor: pointer; border: 1px solid #ffffff; z-index: 10; box-shadow: 0 1px 4px rgba(0,0,0,0.3);">×</span>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 4px; pointer-events: none;">
                        <span style="font-weight: 700; font-size: 13px; color: #ffffff;">Upload Item Image</span>
                        <span style="color: rgba(255, 255, 255, 0.55); font-size: 11px; font-weight: 500;">Drag & drop your file here, or <span style="color: #fce4e8; text-decoration: underline; font-weight: 600;">browse</span></span>
                        <span style="color: rgba(255, 255, 255, 0.35); font-size: 10px;">Supports: JPG, PNG, WEBP (Max 40MB)</span>
                    </div>
                `;
                
                // Insert the custom dropzone right before the hidden file input
                input.parentNode.insertBefore(dropzone, input);
                
                const previewImg = dropzone.querySelector('.upload-preview-img');
                const uploadIcon = dropzone.querySelector('.upload-icon');
                const removeBtn = dropzone.querySelector('.remove-upload-btn');
                const previewBox = dropzone.querySelector('.dropzone-preview-box');
                
                // Click dropzone to trigger hidden file input
                dropzone.addEventListener('click', function(e) {
                    if (e.target !== removeBtn) {
                        input.click();
                    }
                });
                
                // Highlight dropzone on drag over
                dropzone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropzone.style.borderColor = '#fce4e8';
                    dropzone.style.backgroundColor = 'rgba(255, 255, 255, 0.08)';
                });
                
                const resetDropzoneStyle = () => {
                    dropzone.style.borderColor = 'rgba(255, 255, 255, 0.25)';
                    dropzone.style.backgroundColor = 'rgba(255, 255, 255, 0.03)';
                };
                
                dropzone.addEventListener('dragleave', resetDropzoneStyle);
                dropzone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    resetDropzoneStyle();
                    if (e.dataTransfer.files.length) {
                        input.files = e.dataTransfer.files;
                        input.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                });
                
                // Trigger preview when file changes
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            previewImg.src = event.target.result;
                            previewImg.style.display = 'block';
                            uploadIcon.style.display = 'none';
                            removeBtn.style.display = 'flex';
                            previewBox.style.borderColor = 'rgba(255,255,255,0.3)';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewImg.style.display = 'none';
                        uploadIcon.style.display = 'block';
                        removeBtn.style.display = 'none';
                    }
                });
                
                // Clear selection on remove button click
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    input.value = '';
                    previewImg.style.display = 'none';
                    uploadIcon.style.display = 'block';
                    removeBtn.style.display = 'none';
                    previewBox.style.borderColor = 'rgba(255,255,255,0.1)';
                });
            });
        });
    </script>
</body>
</html>
