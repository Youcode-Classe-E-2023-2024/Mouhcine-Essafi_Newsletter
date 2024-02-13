<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
Route::get('/manage-roles-permissions',  [DashboardController::class, 'getUsersRolesPermissions']);

// // Assigner un rôle à un utilisateur
Route::post('/assign-role', [DashboardController::class, 'assignRole'])->name('assign.role');

// Gérer les permissions pour chaque utilisateur
Route::post('/manage-permissions/{user}', [DashboardController::class, 'managePermissions'])->name('manage.permissions');



Route::get('/', function () {
    return view('index');
});

Route::post('subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
