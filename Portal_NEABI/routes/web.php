<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\UsersController;
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
    return view('home.welcome');
});

/*
Route::get('admin/login', function () {
    return view('Admin/login');
});
Route::get('/create_login', function () {
    return view('Admin/create_login');
});
Route::get('/create_event', function () { 
    return view('evento/create');
});
*/
/*
Route::resource('admin', AdminController::class)->only([
    'index', 'show'
]);
Route::resource('admin', AdminController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
*/
Route::resource('admin', AdminController::class)->middleware('auth');
Route::resource('participante',ParticipanteController::class)->middleware('auth');
Route::resource('noticia',NoticiaController::class)->middleware('auth');
Route::resource('evento',EventoController::class)->middleware('auth'); 
/*
Route::get('/criando', function(){
    return view('participante/create');
});
Route::get('/login', function(){
    return view('Participante/login');
});
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('home.welcome');
})->name('dashboard');

Route::post('/evento/participar/{id}',[EventoController::class, 'participar'])->middleware('auth');
Route::get('/eventos',[EventoController::class, 'showEventos'])->middleware('auth');
Route::delete('/evento/sairEvento/{id}', [EventoController::class, 'cancelarInscricao'])->middleware('auth');
Route::post('/evento/usuarios/{id}',[EventoController::class, 'nameUsers'])->middleware('auth');
