<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main.index');
})->name('main');

Route::controller(ProductController::class)->group(function () {
    Route::get('produto/cadastro', 'create')->name('produto.create');
    Route::post('produto/cadastro', 'store');
    Route::get('produto/detalhe/{id}', 'show');
    Route::get('produto/detalhe/{id}', 'update');
    Route::get('produto/delete/{id}', 'delete')->name('product.delete');
    
});

Route::controller(SendController::class)->group(function () {
    Route::get('send/listar', 'list')->name('send.list');
    Route::post('send/listar', 'store')->name('send.store');
    // Route::get('send/cadastro', 'create')->name('send.create');
    // Route::post('send/cadastro', 'store')->name('sendCreate.action');
    Route::get('send/detalhe/{id}', 'update');
    Route::get('send/delete/{id}', 'delete')->name('delete');
    Route::get('send/request/{id}', 'AutoCompleteHandle');
    Route::get('send/pdf', 'renderizarPdf')->name('pdf');
});