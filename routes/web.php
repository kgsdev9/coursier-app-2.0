<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\Render\RenderInvoicePdfController;
use App\Http\Controllers\Render\RenderInvoiceExcellController;
use App\Livewire\CommandeEXtrait;
use App\Livewire\ConfirmadCommande;
use App\Livewire\UserComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|s
*/




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/export/', [RenderInvoiceExcellController::class, 'printCandidatureUserExcell'])->name('candidature.users.export');
Route::get('/usrs/print/all/pdf', [RenderInvoicePdfController::class, 'printCandidatureUserPDF'])->name('candidature.users.pdf');
Route::get('/admin/export/all', [RenderInvoiceExcellController::class, 'printCandidatureAdminExcell'])->name('candidature.admin.export');
Route::get('/admin/print/all/pdf', [RenderInvoicePdfController::class, 'printCandidatureAdminPDF'])->name('candidature.admin.pdf');
Route::get('/export/versement/all', [RenderInvoicePdfController::class, 'printVersement'])->name('versement.pdf');

Route::get('/liste/cmde/extrait', CommandeEXtrait::class)->name('cmde.extrait')->middleware('restrict.access');;

Route::get('/confirmated-commande',ConfirmadCommande::class)->name('commande.confirmated');
Route::get('/liste-users',UserComponent::class)->name('users');


