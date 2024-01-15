<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\Render\RenderInvoicePdfController;
use App\Http\Controllers\Render\RenderInvoiceExcellController;
use App\Http\Controllers\UserCandidatureController;
use App\Http\Controllers\VersementController;
use App\Livewire\UserComponent;

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


Route::resource('candidature', CandidatureController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//export candidature excell par usrs

Route::get('users/export/', [RenderInvoiceExcellController::class, 'printCandidatureUserExcell'])->name('candidature.users.export');
Route::get('/usrs/print/all/pdf', [RenderInvoicePdfController::class, 'printCandidatureUserPDF'])->name('candidature.users.pdf');

//export candidature administrators

Route::get('/admin/export/all', [RenderInvoiceExcellController::class, 'printCandidatureAdminExcell'])->name('candidature.admin.export');
Route::get('/admin/print/all/pdf', [RenderInvoicePdfController::class, 'printCandidatureAdminPDF'])->name('candidature.admin.pdf');

//exportation des versement en pdf
Route::get('/export/versement/all', [RenderInvoicePdfController::class, 'printVersement'])->name('versement.pdf');


Route::get('/candidatures/all', [HomeController::class, 'allCandidaures'])->name('all.candidatures');


Route::get('/versement', VersementController::class)->name('versement.all');

Route::post('/import-candidature', [ImportController::class, 'import'])->name('import.candidature');

Route::get('/users', UserComponent::class)->name('users.liste');

Route::get('/users/candidature/{user}', [UserCandidatureController::class ,'index'])->name('users.candidature');
