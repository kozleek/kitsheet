<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitController;
use App\Http\Controllers\SheetController;

Route::get('/', [KitController::class, 'create'])->name('kit.new');
//Route::post('/kit/{kit}/create', [KitController::class, 'create'])->name('kit.create');
Route::get('/kit/{kit}', [KitController::class, 'show'])->name('kit.show');
Route::get('/kit/{kit}/edit', [KitController::class, 'edit'])->name('kit.edit');
//Route::patch('/kit/{kit}', [KitController::class, 'update'])->name('kit.update');
Route::delete('/kit/{kit}', [KitController::class, 'destroy'])->name('kit.destroy');
Route::get('/kit/{kit}/print', [KitController::class, 'print'])->name('kit.print');

Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
Route::post('sheet/{sheet}/check', [SheetController::class, 'check'])->name('sheet.check');
