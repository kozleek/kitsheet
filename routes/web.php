<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\SheetController;

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
Route::post('/sheet/{sheet}/check', [SheetController::class, 'check'])->name('sheet.check');

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/{id}/thank-you', [FeedbackController::class, 'thankYou'])->name('feedback.thankYou');
