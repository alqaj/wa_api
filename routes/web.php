<?php

use App\Http\Controllers\NotifController;
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

Route::get('/send_by_venom', function (){
    return view('wa_notif_venom');
});
Route::post('/send_by_venom', [NotifController::class,'send_by_venom'])->name('send_by_venom');

Route::get('/data_permintaan', [NotifController::class,'show_data'])->name('show_data');
Route::get('/cek_data_permintaan', [NotifController::class,'cek_data'])->name('cek_data');
