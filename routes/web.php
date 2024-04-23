<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\WorksheetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [KitController::class, 'create'])->name('kits.create');
Route::get('/{id}', [KitController::class, 'show'])->name('kits.show');
Route::get('/{id}/print', [KitController::class, 'print'])->name('kits.print');
Route::get('/{id}/edit', [KitController::class, 'edit'])->name('kits.edit');
Route::get('/{id}/remove', [KitController::class, 'remove'])->name('kits.remove');

Route::get('/worksheet/{id}', [WorksheetController::class, 'show'])->name('worksheets.show');
