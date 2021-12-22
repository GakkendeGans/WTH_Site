<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Models\Menu;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ArticleController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

$mainmenu = [['user',UserController::class],['cat',CategoryController::class],['menu', MenuController::class], ['article', ArticleController::class]];

//Route::middleware('auth')->group(function () {
    foreach($mainmenu as &$menu) {
        Route::get($menu[0].'/', [$menu[1], 'index']);
        Route::get($menu[0].'/create', [$menu[1], 'create']);
        Route::post($menu[0].'/store', [$menu[1], 'store']);
        Route::get($menu[0].'/{id}', [$menu[1], 'show']);
        Route::get($menu[0].'/{id}/edit', [$menu[1], 'edit']);
        Route::delete($menu[0].'/{id}/destroy', [$menu[1], 'destroy']);
    }
//}
// Route::middleware('auth')->group(function () {
//     Route::get('/user/index', [UserController::class, 'index']);
//     Route::get('/user/create', [UserController::class, 'create']);
//     Route::post('/user/store', [UserController::class, 'store']);
//     Route::get('/user/{id}', [UserController::class, 'show']);
//     Route::get('/user/{id}/edit', [UserController::class, 'edit']);
//     Route::delete('/user/{id}/destroy', [UserController::class, 'destroy']);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/menu/index', [MenuController::class, 'index']);
//     Route::get('/menu/create', [MenuController::class, 'create']);
//     Route::post('/menu/store', [MenuController::class, 'store']);
//     Route::get('/menu/{id}', [MenuController::class, 'show']);
//     Route::get('/menu/{id}/edit', [MenuController::class, 'edit']);
//     Route::delete('/menu/{id}/destroy', [MenuController::class, 'destroy']);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/article/index', [ArticleController::class, 'index']);
//     Route::get('/article/create', [ArticleController::class, 'create']);
//     Route::post('/article/store', [ArticleController::class, 'store']);
//     Route::get('/article/{id}', [ArticleController::class, 'show']);
//     Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
//     Route::delete('/article/{id}/destroy', [ArticleController::class, 'destroy']);
// });

foreach (Menu::all() as $menu) {
    $route = strtolower($menu->name);
    Route::get("/article/$route", [ArticleController::class, 'show']);
}

require __DIR__.'/auth.php';
