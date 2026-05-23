<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;

Route::get('/', function () {
    return redirect()->route('ia.formulario');
});

Route::get('/ia-config', [IaController::class, 'mostrarFormulario'])->name('ia.formulario');
Route::post('/ia-config', [IaController::class, 'procesarIa'])->name('ia.procesar');
