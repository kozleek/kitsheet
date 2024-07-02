<?php

use App\Http\Middleware\SetLanguage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ReportController;

Route::get('/', [KitController::class, 'create'])->name('kit.create');
Route::post('/kit/store', [KitController::class, 'store'])->name('kit.store');
Route::get('/kit/{kit}/edit', [KitController::class, 'edit'])->name('kit.edit');
Route::patch('/kit/{kit}/update', [KitController::class, 'update'])->name('kit.update');
Route::get('/kit/{kit}', [KitController::class, 'show'])->name('kit.show');
Route::delete('/kit/{kit}', [KitController::class, 'destroy'])->name('kit.destroy');
Route::get('/kit/{kit}/print', [KitController::class, 'print'])->name('kit.print');
Route::get('/kit/{kit}/qr', [KitController::class, 'qr'])->name('kit.qr');
Route::get('/kit/{kit}/excel', [KitController::class, 'excel'])->name('kit.excel');

Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
Route::get('/s/{fingerprint}', [SheetController::class, 'showByFingerprint'])->name('sheet.fingerprint');
Route::post('/sheet/{sheet}/check', [SheetController::class, 'check'])->name('sheet.check');

Route::get('/report', [ReportController::class, 'create'])->name('report.create');
Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/report/{id}/thank-you', [ReportController::class, 'thankYou'])->name('report.thankYou');
