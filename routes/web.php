<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\SheetController;

Route::get('/', [KitController::class, 'create'])->name('kit.create');
Route::post('/store', [KitController::class, 'store'])->name('kit.store');
Route::get('/{kit}/edit', [KitController::class, 'edit'])->name('kit.edit');
Route::patch('/{kit}/update', [KitController::class, 'update'])->name('kit.update');
Route::get('/{kit}', [KitController::class, 'show'])->name('kit.show');
Route::delete('/{kit}', [KitController::class, 'destroy'])->name('kit.destroy');
Route::get('/{kit}/print', [KitController::class, 'print'])->name('kit.print');

Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
Route::post('sheet/{sheet}/check', [SheetController::class, 'check'])->name('sheet.check');

//Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::view('/feedback', 'feedback.create');
