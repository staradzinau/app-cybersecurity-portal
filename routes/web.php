<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\VulnerabilityController;

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
    return Redirect::route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(
        [
            'prefix' => 'vulnerability',
            'as' => 'vulnerability.'
        ],
        function () {
            Route::get(
                '/index',
                [VulnerabilityController::class, 'index']
            )->name('index');
            Route::get(
                '/create',
                [VulnerabilityController::class, 'getCreationView']
            )->name('creation.view');
            Route::post(
                '/create',
                [VulnerabilityController::class, 'create']
            )->name('creation.submit');
            Route::delete(
                '/delete/{id}',
                [VulnerabilityController::class, 'delete']
            )->name('delete');
            Route::get(
                '/edit/{vulnerability}',
                [VulnerabilityController::class, 'edit']
            )->name('edit');
        }
    );
});

require __DIR__.'/auth.php';
