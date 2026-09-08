<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class WordPressController extends Controller
{
    public function index()
    {
        $wpUrl = rtrim(env('WORDPRESS_URL'), '/');

        // Tambahkan parameter ?_embed agar WordPress mengirim detail featured image (URL gambar)
        $response = Http::withoutVerifying()
            ->withHeaders([
                'ngrok-skip-browser-warning' => 'true',
            ])
            ->get("{$wpUrl}/wp-json/wp/v2/project?_embed");

        $projects = $response->successful() ? $response->json() : [];

        return view('welcome', compact('projects'));
    }
    public function getProject($id)
    {
        $wpUrl = rtrim(env('WORDPRESS_URL'), '/'); // URL Ngrok dari .env

        // 1. Ambil data detail project dari WordPress
        $response = Http::withoutVerifying()
            ->withHeaders([
                'ngrok-skip-browser-warning' => 'true',
            ])
            ->get("{$wpUrl}/wp-json/wp/v2/project/{$id}");

        if ($response->successful()) {
            $project = $response->json();
            $imageUrl = null;

            // 2. Ambil ID media dari ACF image_project (ID 27)
            $imageId = $project['acf']['image_project'] ?? null;

            if ($imageId) {
                // Hit API Media ke WordPress
                $mediaResponse = Http::withoutVerifying()
                    ->withHeaders([
                        'ngrok-skip-browser-warning' => 'true',
                    ])
                    ->get("{$wpUrl}/wp-json/wp/v2/media/{$imageId}");

                if ($mediaResponse->successful()) {
                    $mediaData = $mediaResponse->json();

                    // Prioritaskan source_url asli dari media
                    $rawUrl = $mediaData['source_url']
                        ?? $mediaData['media_details']['sizes']['full']['source_url']
                        ?? null;

                    if ($rawUrl) {
                        // PAKSA ganti localhost/127.0.0.1 menjadi URL Ngrok agar bisa diakses browser
                        $imageUrl = str_replace(
                            ['http://localhost/wordpress', 'http://127.0.0.1/wordpress'],
                            $wpUrl,
                            $rawUrl
                        );
                    }
                }
            }

            return view('projects.show', compact('project', 'imageUrl'));
        }

        abort(404, 'Project not found in WordPress');
    }
}
