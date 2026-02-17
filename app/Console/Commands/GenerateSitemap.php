<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate XML sitemap for SEO';

    public function handle()
    {
        $baseUrl = config('app.url', 'http://localhost:8000');

        $urls = [
            ['loc' => '/', 'priority' => '1.0'],
            ['loc' => '/flights', 'priority' => '0.9'],
            ['loc' => '/hotels', 'priority' => '0.9'],
            ['loc' => '/cars', 'priority' => '0.9'],
            ['loc' => '/blog', 'priority' => '0.8'],
            ['loc' => '/about', 'priority' => '0.6'],
            ['loc' => '/contact', 'priority' => '0.6'],
            // Route landing pages
            ['loc' => '/routes/nyc-lon', 'priority' => '0.8'],
            ['loc' => '/routes/lax-par', 'priority' => '0.8'],
            ['loc' => '/routes/nyc-dxb', 'priority' => '0.8'],
            ['loc' => '/routes/nyc-tyo', 'priority' => '0.8'],
        ];

        // Automatically scan for blog posts
        $blogPath = resource_path('views/blog');
        if (File::exists($blogPath)) {
            $files = File::files($blogPath);
            foreach ($files as $file) {
                $filename = $file->getFilenameWithoutExtension(); // e.g., zipair-review.blade.php -> zipair-review
                
                // Skip index and internal partials
                if ($filename === 'index' || str_starts_with($filename, '_')) {
                    continue;
                }

                // Remove .blade extension if getFilenameWithoutExtension didn't clean it fully (it acts on the last extension)
                $slug = str_replace('.blade', '', $filename);

                $urls[] = ['loc' => "/blog/{$slug}", 'priority' => '0.7'];
            }
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . $baseUrl . $url['loc'] . '</loc>' . PHP_EOL;
            $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully at public/sitemap.xml');
        $this->info('Total URLs: ' . count($urls));
    }
}
