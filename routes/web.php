 <?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('series')->group(function () {

    Route::get('/', [SeriesController::class, 'index'])->name('index');
    Route::get('create', [SeriesController::class, 'create'])->name('create_series');
    Route::post('create', [SeriesController::class, 'store']);
    Route::delete('{id}', [SeriesController::class, 'destroy'])->name('delete');

    Route::get('{id}/seasons', [SeasonsController::class, 'index'])->name('seasons');
    Route::post('{id}/edit', [SeriesController::class, 'update']);

    Route::prefix('season')->group(function () {

        Route::get('{season}/episodes', [EpisodesController::class, 'index'])->name('episodes_by_seasons');
        Route::post('{season}/episodes/watch', [EpisodesController::class, 'watch'])->name('watch_episodes');
    });
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('auth-user', [AuthController::class, 'auth'])->name('auth_user');

Route::get('create-user', [UserController::class, 'create'])->name('create_user');
Route::post('create-user', [UserController::class, 'store']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
