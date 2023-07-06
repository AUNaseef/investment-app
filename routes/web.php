<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/unapproved', function () {
    return view('unapproved');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('approved')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/investments/{investment}', [InvestmentController::class, 'show']);

        Route::middleware('role:admin')->group(function () {
            Route::get('/users', function () {
                return view('users.index');
            });

            Route::get('/customers/{user}/approve', [CustomerController::class, 'approve']);
            Route::get('/customers/{user}', [CustomerController::class, 'show']);
            Route::post('/customers/{user}/add-investment', [CustomerController::class, 'add_investment']);
            Route::get('/customers', [CustomerController::class, 'index']);

            Route::get('/payments', [PaymentController::class, 'index']);

            Route::put('/payments/{payment}', [PaymentController::class, 'update']);
        });
    });
});

require __DIR__ . '/auth.php';
