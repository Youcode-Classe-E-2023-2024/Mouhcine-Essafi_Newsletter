<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Models\Member;
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



// // Assigner un rôle à un utilisateur
Route::get('/manage-roles',  [DashboardController::class, 'getUsersRolesPermissions'])->name('manage-roles');
Route::post('/assign-role', [DashboardController::class, 'assignRole'])->name('assign.role');

// Route::middleware(['auth'])->name('media')->prefix('media')->group(function () {
    Route::get('/media', [MediaController::class, 'media'])->name('media');
    Route::post('/media', [MediaController::class, 'media'])->name('editor.media');

// });

Route::get('/add_template', [TemplateController::class, 'index'])->name('add_template');
Route::post('/save_template', [TemplateController::class, 'store'])->name('save_template');

Route::get('/', function () {
    return view('index');
});

Route::post('subscribe', [MemberController::class, 'subscribe'])->name('subscribe');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
