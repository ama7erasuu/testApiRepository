<?php

use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::controller(DocsController::class)->prefix('docs')->group(function () {
    Route::get('/swagger/{version}', 'index')->name('docs.index');
    Route::get('/swagger/{version}/yaml', 'getDocsFile')->name('docs.file');
});

