<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PartageController;
use App\Http\Controllers\LocalizationController;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes liées aux étudiants
Route::resource('etudiants', EtudiantController::class);

// Routes d'authentification
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('registration', [CustomAuthController::class, 'store'])->name('user.store');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentification'])->name('login.authentification');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// Routes du forum
Route::resource('articles', ArticleController::class)->middleware('auth');
Route::get('/articles/{article}/PDF', [ArticleController::class, 'showPdf'])->name('showPdf');

// Partage de fichiers
Route::get('/partage/create', [PartageController::class, 'create'])->name('partage.create');
Route::post('/files', [PartageController::class, 'store'])->name('files.store');
Route::get('/partage', [PartageController::class, 'index'])->name('partage.index');
