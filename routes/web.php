<?php

use App\Http\Controllers\DaftarkerjaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Daftarkerja;
use App\Models\tag;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckRole;


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

// Route::get('/', function () {
//     $daftarkerjas = Daftarkerja::all();

//     return view('daftarkerja.index', compact('daftarkerjas'));
// })->name('Daftarkerja.index');

// Route::get('/', [Controllers\DaftarkerjaController::class, 'index'])
//     ->name('Daftarkerja.index');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    return view('dashboard', [
        'Daftarkerja' => $request->user()->Daftarkerja
        
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/landing', [Controllers\DaftarkerjaController::class, 'index'])
->middleware(['auth', 'verified'])
->name('Daftarkerja.index')->middleware(['auth', 'verified']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');



Route::middleware(['auth', 'check.role:recruiter'])->group(function () {
        Route::post('/new', [Controllers\DaftarkerjaController::class, 'store'])
            ->name('Daftarkerja.store');
        Route::get('/new', [Controllers\DaftarkerjaController::class, 'create'])
            ->name('Daftarkerja.create');
        
    });;
    Route::view('/not_recruiter', 'not_recruiter')->name('not_recruiter');

Route::delete('/daftarkerja/{id}', [Controllers\DaftarkerjaController::class, 'destroy'])->name('Daftarkerja.destroy');

Route::middleware('auth')->group(function () {
   
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 


});

require __DIR__.'/auth.php';
Route::get('/{Daftarkerja}', [Controllers\DaftarkerjaController::class, 'show'])
->name('Daftarkerja.show');

Route::get('/{Daftarkerja}/apply', [Controllers\DaftarkerjaController::class, 'apply'])
->name('Daftarkerja.apply');


