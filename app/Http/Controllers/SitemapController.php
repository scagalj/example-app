<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SitemapController extends Controller {

    public function index() {
        // Generate your sitemap content dynamically

        $date = Carbon::now()->format('Y-m-d');

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $apartments = Apartment::all();
        // Loop through supported locales
        foreach (LaravelLocalization::getSupportedLocales() as $locale => $properties) {
            // Add URLs for each locale to the sitemap
//            $url = LaravelLocalization::getLocalizedURL($locale);

            $url = url('/' . $locale);

            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $url . '</loc>';
            $sitemap .= '<lastmod>' . $date . '</lastmod>';
            $sitemap .= '<priority>1.0</priority>';
            $sitemap .= '</url>';

            $url = url('/' . $locale . '/contactus');
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $url . '</loc>';
            $sitemap .= '<lastmod>' . $date . '</lastmod>';
            $sitemap .= '<priority>1.0</priority>';
            $sitemap .= '</url>';
            
            $url = url('/' . $locale . '/privacypolicy');
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $url . '</loc>';
            $sitemap .= '<lastmod>' . $date . '</lastmod>';
            $sitemap .= '<priority>1.0</priority>';
            $sitemap .= '</url>';
            
            $url = url('/' . $locale . '/selfcheckin');
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $url . '</loc>';
            $sitemap .= '<lastmod>' . $date . '</lastmod>';
            $sitemap .= '<priority>1.0</priority>';
            $sitemap .= '</url>';

            foreach ($apartments as $apartment) {
                $url = url('/' . $locale . '/apartment/' . $apartment->id);
                $sitemap .= '<url>';
                $sitemap .= '<loc>' . $url . '</loc>';
                $sitemap .= '<lastmod>' . $date . '</lastmod>';
                $sitemap .= '<priority>1.0</priority>';
                $sitemap .= '</url>';
            }
        }

        $sitemap .= '</urlset>';

        return Response::make($sitemap, 200, [
                    'Content-Type' => 'application/xml',
        ]);
    }

}
