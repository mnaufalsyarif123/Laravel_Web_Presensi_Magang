<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;

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
    return view('layouts.app');
});






// Route untuk halaman presensi
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');

// Route untuk proses check-in
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');

// Route untuk proses check-out
Route::post('/presensi/checkout/{uuid}', [PresensiController::class, 'checkOut'])->name('presensi.checkout');



Route::get('/admin/kehadiran', function () {
    return view('admin.kehadiran');
});

Route::get('/admin/peserta', function () {
    return view('admin.peserta');
});




Route::get('/kehadiran', function () {
    return view('user.kehadiran');
});


Route::get('/profile', function () {
    return view('user.profile');
});

// Route::get('/test-db', function () {
//     try {
//         $results = DB::select('SHOW TABLES');
//         return response()->json($results);
//     } catch (\Exception $e) {
//         return "Error: " . $e->getMessage();
//     }
// });



