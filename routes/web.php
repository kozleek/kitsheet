<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ReportController;

Route::localized(function () {
    Route::get('/', [KitController::class, 'create'])->name('kit.create');
    Route::get('/kit/{kit}/edit', [KitController::class, 'edit'])->name('kit.edit');
    Route::get('/kit/{kit}', [KitController::class, 'show'])->name('kit.show');
    Route::get('/kit/{kit}/print', [KitController::class, 'print'])->name('kit.print');
    Route::get('/kit/{kit}/qr', [KitController::class, 'qr'])->name('kit.qr');
    Route::get('/kit/{kit}/excel', [KitController::class, 'excel'])->name('kit.excel');
    Route::get('/kit/{kit}/pdf', [KitController::class, 'pdf'])->name('kit.pdf');
    Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
    Route::get('/s/{fingerprint}', [SheetController::class, 'showByFingerprint'])->name('sheet.fingerprint');
    Route::get('/report', [ReportController::class, 'create'])->name('report.create');
    Route::get('/report/{id}/thank-you', [ReportController::class, 'thankYou'])->name('report.thankYou');

    Route::post('/kit/store', [KitController::class, 'store'])->name('kit.store')->middleware(ProtectAgainstSpam::class);
    Route::patch('/kit/{kit}/update', [KitController::class, 'update'])->name('kit.update');
    Route::delete('/kit/{kit}', [KitController::class, 'destroy'])->name('kit.destroy');
    Route::post('/sheet/{sheet}/check', [SheetController::class, 'check'])->name('sheet.check');
    Route::post('/report/store', [ReportController::class, 'store'])->name('report.store')->middleware(ProtectAgainstSpam::class);
});

Route::fallback(\CodeZero\LocalizedRoutes\Controllers\FallbackController::class);
