<?php
/**
 * Quick Bootstrap Script - Run this from Laravel root
 * Command: php artisan tinker < bootstrap_ems.php
 * Or manually copy the content to artisan tinker
 */

// Create directories if they don't exist
$directories = [
    'resources/views/auth',
    'resources/views/departments',
    'resources/views/employees',
    'resources/views/salaries',
    'resources/views/reports',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "Created: $dir\n";
    }
}

echo "All directories created successfully!\n";
echo "Now refresh your browser.\n";
