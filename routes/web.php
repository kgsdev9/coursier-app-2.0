<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\Render\RenderInvoicePdfController;
use App\Http\Controllers\Render\RenderInvoiceExcellController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('candidature', CandidatureController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//export candidature excell

Route::get('users/export/', [RenderInvoiceExcellController::class, 'printCandidatureUserExcell'])->name('candidature.users.export');

Route::get('/usrs/print/all/pdf', [RenderInvoicePdfController::class, 'printCandidatureUserPDF'])->name('candidature.users.pdf');
