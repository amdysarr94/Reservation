<?php
use App\Http\Controllers\ConfirmMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ReservationController;

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
})->name('home');
Route::get('/register/client', [ClientController::class, 'registration'])->name('register.client');
Route::Post('/post/register/client', [ClientController::class, 'postregistration'])->name('post.register.client');
Route::get('/register/association', [AssociationController::class, 'registration'])->name('register.association');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::Post('/post/login', [AuthController::class, 'authentificate'])->name('post.login');
Route::get('/login/client', [ClientController::class, 'login'])->name('login.association');
Route::Post('/post/register/association', [AssociationController::class, 'postregistration'])->name('post.register.association');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/client/reservation/form/{id}',[ReservationController::class, 'reserve'])->name('clientReserve');
Route::Post('/client/reservation/form/add/{id}',[ReservationController::class, 'reserveAdd'])->name('clientReserveAdd');
Route::get('/list/reservation/{id}',[ReservationController::class, 'index'])->name('indexClient');
Route::get('/client/reservation/{id}',[ReservationController::class, 'evenement'])->name('homeClient');
Route::middleware(['check.client'])->group(function () {
   //middleware non fonctionnel
 
});
Route::middleware(['check.association'])->group(function () {
    // Routes accessibles uniquement aux associations
    Route::get('/dashboard', function(){
        return view('associationDashboard');
    })->name('dashboardAssos');
    
});
Route::get('/add/event/{id}',[EvenementController::class, 'index'])->name('indexevent');
    Route::Post('/add/event/post', [EvenementController::class, 'addevent'])->name('addevent');
    Route::get('/list/event/post/{id}', [EvenementController::class, 'list'])->name('listevent');
    Route::get('/list/event/update/{id}', [EvenementController::class, 'update'])->name('updateEvent');
    Route::Post('/event/update/save/{id}', [EvenementController::class, 'updateSave'])->name('updateSaveEvent');
    Route::Post('/event/update/fin/{id}', [EvenementController::class, 'finish'])->name('finishEvent');
    Route::Post('/event/update/suppr/{id}', [EvenementController::class, 'Delete'])->name('deleteEvent');
    // id de /list/client/reservation/{id} l'associationconnecté
    Route::get('/list/client/reservation/{id}',[ReservationController::class, 'reserveList'])->name('listClientReservation');
    Route::Post('send/mail', [ConfirmMailController::class, 'index'])->name('validateEmail');