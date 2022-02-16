<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ParticipanteController;
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
Route::get('/', function () {
    return view('home/welcome');
});

Route::get('/login_admin', function () {
    return view('Admin/login');
});
Route::get('/create_login', function () {
    return view('Admin/create_login');
});
Route::get('/create_event', function () {
    return view('Admin/create_event');
});
/*
Route::resource('admin', AdminController::class)->only([
    'index', 'show'
]);
Route::resource('admin', AdminController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
*/
Route::resource('admin', AdminController::class);
Route::resource('participante',ParticipanteController::class);
Route::resource('noticia',NoticiaController::class);
Route::resource('evento',EventoController::class);
 