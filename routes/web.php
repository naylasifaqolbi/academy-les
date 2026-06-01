<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PendaftaranController;
use App\Models\Siswa;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    return back()->withErrors([
        'email' => 'Login gagal',
    ]);
});

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {
    return view('auth.register');
});

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/user/dashboard', function () {

    $pendaftaran = Siswa::where(
        'user_id',
        Auth::id()
    )->first();

    return view(
        'user.dashboard',
        compact('pendaftaran')
    );

})->middleware('auth');

    Route::get('/pendaftaran', [PendaftaranController::class, 'create']);
    Route::post('/pendaftaran', [PendaftaranController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [
        AdminController::class,
        'index'
    ]);

    Route::get('/admin/detail/{id}', [
        AdminController::class,
        'detail'
    ]);

    Route::get('/admin/edit/{id}', [
        AdminController::class,
        'edit'
    ]);

    Route::put('/admin/update/{id}', [
        AdminController::class,
        'update'
    ]);

    Route::delete('/admin/delete/{id}', [
        AdminController::class,
        'destroy'
    ]);

    Route::put('/admin/status/{id}', [
        AdminController::class,
        'updateStatus'
    ]);

});