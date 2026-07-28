<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\Setting::set('site_name', "BOBLO'S");
echo "Setting site_name is now: " . \App\Models\Setting::get('site_name') . "\n";
