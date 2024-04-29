<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\SheetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [KitController::class, 'create'])->name('kit.create');
Route::get('/kit/{id}', [KitController::class, 'show'])->name('kit.show');
Route::get('/kit/{id}/print', [KitController::class, 'print'])->name('kit.print');
Route::get('/kit/{id}/edit', [KitController::class, 'edit'])->name('kit.edit');
Route::get('/kit/{id}/remove', [KitController::class, 'remove'])->name('kit.remove');

Route::get('/sheet/{id}', [SheetController::class, 'show'])->name('sheet.show');
