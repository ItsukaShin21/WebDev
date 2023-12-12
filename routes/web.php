<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [DataController::class, 'displayData'], function () {
    return view('portfolio');
}) -> name('portfolio');

Route::get('/edit', [DataController::class, 'fetchData'], function () {
    return view('editportfolio');
}) -> name('edit');

Route::get('/login', function() {
    return view('loginPage');
}) -> name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/edit', [DataController::class, 'saveData'])->name('saveData');
Route::post('/edit/delete-skill', [DataController::class, 'deleteSkill'])->name('deleteSkill');
