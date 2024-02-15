<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

Route::get('/manage-media',  [MediaController::class, 'index'])->name('media');


// // Assigner un rôle à un utilisateur
Route::get('/manage-roles',  [DashboardController::class, 'getUsersRolesPermissions'])->name('manage-roles');
Route::post('/assign-role', [DashboardController::class, 'assignRole'])->name('assign.role');




Route::get('/', function () {
    return view('index');
});

Route::post('subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
