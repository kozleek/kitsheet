<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SheetController;

Route::get('/', [KitController::class, 'create'])->name('kit.create');
Route::get('/kit/{kit}', [KitController::class, 'show'])->name('kit.show');
Route::get('/kit/{kit}/edit', [KitController::class, 'edit'])->name('kit.edit');
Route::get('/kit/{kit}/print', PrintController::class)->name('kit.print');
Route::delete('/kit/{kit}', [KitController::class, 'destroy'])->name('kit.destroy');

Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
