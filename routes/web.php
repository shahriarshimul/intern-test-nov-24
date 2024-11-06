<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    return view('demo');
});

Route::get('/images/upload', [ImageController::class, 'showUploadForm'])->name('images.upload');
Route::post('/images/upload', [ImageController::class, 'uploadImage'])->name('images.upload.post');
Route::get('/images', [ImageController::class, 'listImages'])->name('images.list');

Route::delete('/images/{id}/delete', [ImageController::class, 'deleteImage']);

