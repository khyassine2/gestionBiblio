<?php

use App\Http\Controllers\LivreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\TempLivreController;
use App\Models\Livre;
use App\Models\Personne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();
// route contacte
Route::get('contact',function(){
    return view('contact');
})->name('contact');

Route::get('/', [App\Http\Controllers\LivreController::class, 'index'])->name('home');
//verification numInscription
Route::post('/location/verification',[PersonneController::class,'verification'])->name('verification');
//offrir
Route::get('/offrir',[TempLivreController::class,'create'])->name('offrirlivre');
Route::post('/offrirstore',[TempLivreController::class,'store'])->name('offrirstore');


// route de location
Route::get('/locations',[LocationController::class,'index'])->name('locations');
Route::get('/locations/{id}',[LocationController::class,'create'])->name('createLocation');
Route::post('/locations',[LocationController::class,'louer'])->name('louer');


//route de Seances  consulterSeances
Route::get('/consulterSeances',[SeanceController::class,'index'])->name('consulterSeances');
Route::get('/detailsSeances\@2{id}090',[SeanceController::class,'show'])->name('detailsSeances');


//pour gerers l'admin
Route::get('/gestionLivre',[TempLivreController::class,'index'])->name('gestionLivre');
Route::get('/acceptrequestLivre',[LivreController::class,'store'])->name('acceptrequestLivre');
Route::delete('/refuserequestLivre/{id}',[TempLivreController::class,'delete'])->name('refuserequestLivre');
Route::get('/showLivre/{id}',[LivreController::class,'show'])->name('showLivre');
Route::delete('/livre/{id}',[LivreController::class,'destroy'])->name('DeleteLivre');
//ressource livre
Route::resource('/livre',LivreController::class);
//ressource seances
Route::resource('seances',SeanceController::class);
Route::post('/seances/delete',[SeanceController::class,'destroy'])->name('deleteper');

//ressource mombre
Route::resource('/membres',PersonneController::class);
