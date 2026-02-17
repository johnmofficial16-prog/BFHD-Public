<?php
$paths = [
    __DIR__.'/../storage/framework/views/*',
    __DIR__.'/../storage/framework/cache/data/*',
    __DIR__.'/../bootstrap/cache/*.php'
];

foreach ($paths as $pattern) {
    $files = glob($pattern);
    foreach ($files as $file) {
        if (is_file($file)) {
            @unlink($file);
        }
    }
}

echo "✅ Cache cleared! Refresh your site now.";
?>