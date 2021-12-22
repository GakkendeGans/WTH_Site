<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewtypeController;
use App\Models\Page;
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

$mainmenu = [['user',UserController::class],['viewtype',ViewtypeController::class],['page', PageController::class], ['article', ArticleController::class]];


foreach($mainmenu as &$menu) {
        Route::get($menu[0].'/', [$menu[1], 'index'])->middleware(['auth']);
        Route::get($menu[0].'/create', [$menu[1], 'create'])->middleware(['auth']);
        Route::post($menu[0].'/store', [$menu[1], 'store'])->middleware(['auth']);
        Route::get($menu[0].'/{id}', [$menu[1], 'show'])->middleware(['auth']);
        Route::get($menu[0].'/{id}/edit', [$menu[1], 'edit'])->middleware(['auth']);
        Route::delete($menu[0].'/{id}/destroy', [$menu[1], 'destroy'])->middleware(['auth']);
}

foreach (Page::all() as $page) {
    $route = strtolower($page->name);
    Route::get("/$route", [ArticleController::class, 'show']);
}
require __DIR__.'/auth.php';
