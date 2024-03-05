<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tasks', function () {
//     return view('mytasks');
// })->middleware(['auth', 'verified'])->name('mytasks');

// Route::resource('mytasks', TaskController::class);

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('mytasks');
    Route::get('/tasks/new', [TaskController::class, 'new'])->name('mytasks.new');
    Route::post('/tasks/create', [TaskController::class, 'create'])->name('mytasks.create');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('mytasks.edit');
    Route::put('/tasks/update', [TaskController::class, 'update'])->name('mytasks.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
