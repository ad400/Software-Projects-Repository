<?php

use App\Http\Controllers\PenseeController;
use Illuminate\Support\Facades\Route;

// ADZ: page d'accueil avec affichage des pensees.
Route::get('/', [PenseeController::class, 'index'])->name('pensees.index');
// ADZ: creation d'une nouvelle pensee.
Route::post('/pensees', [PenseeController::class, 'store'])->name('pensees.store');
// ADZ: suppression d'une pensee precise.
Route::delete('/pensees/{pensee}', [PenseeController::class, 'destroy'])->name('pensees.destroy');
  