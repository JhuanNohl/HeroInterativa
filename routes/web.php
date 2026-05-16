<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/build/{path}', function (string $path) {
    $basePath = realpath(public_path('build'));
    $filePath = $basePath ? realpath($basePath.DIRECTORY_SEPARATOR.$path) : false;

    abort_unless(
        $filePath && str_starts_with($filePath, $basePath.DIRECTORY_SEPARATOR) && is_file($filePath),
        404
    );

    return response()->file($filePath, [
        'Content-Type' => File::mimeType($filePath) ?: 'application/octet-stream',
        'Cache-Control' => str_contains($path, 'manifest')
            ? 'no-cache'
            : 'public, max-age=31536000, immutable',
    ]);
})->where('path', '.*');

Route::get('/', function () {
    return view('welcome');
});
