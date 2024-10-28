<?php

use App\Http\Controllers\produtoController;
use App\Http\Controllers\vendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/produto', [produtoController::class, 'salvar']);
Route::get('/produto/{id}', [produtoController::class, 'listarPeloId']);
Route::get('/produto', [produtoController::class, 'listar']);
Route::put('/produto/{id}', [produtoController::class, 'editar']);
Route::delete('/produto/{id}', [produtoController::class, 'excluir']);


Route::post('/vendedor', [vendedorController::class, 'salvar']);
Route::get('/vendedor/{id}', [vendedorController::class, 'listarPeloId']);
Route::get('/vendedor', [vendedorController::class, 'listar']);
Route::put('/vendedor/{id}', [vendedorController::class, 'editar']);
Route::delete('/vendedor/{id}', [vendedorController::class, 'excluir']);




