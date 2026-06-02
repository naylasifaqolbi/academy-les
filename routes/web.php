<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Siswa;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/profile', function () {
    return view('profile');
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

    $credentials = $request->only(
        'email',
        'password'
    );

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    return back()->withErrors([
        'email' => 'Login gagal'
    ]);
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');

})->middleware('auth');

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make(
            $request->password
        ),
        'role' => 'user',
    ]);

    return redirect('/login')
        ->with(
            'success',
            'Registrasi berhasil, silakan login.'
        );
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

    });

    Route::get(
        '/pendaftaran',
        [PendaftaranController::class, 'create']
    );

    Route::post(
        '/pendaftaran',
        [PendaftaranController::class, 'store']
    );

});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get(
        '/admin/dashboard',
        [AdminController::class, 'index']
    );

    // DATA SISWA
    Route::get(
        '/admin/siswa',
        [AdminController::class, 'dataSiswa']
    );

    // EXPORT PDF
    Route::get(
        '/admin/pdf',
        [AdminController::class, 'exportPdf']
    );

    // DETAIL SISWA
    Route::get(
        '/admin/detail/{id}',
        [AdminController::class, 'detail']
    );

    // EDIT SISWA
    Route::get(
        '/admin/edit/{id}',
        [AdminController::class, 'edit']
    );

    // UPDATE SISWA
    Route::put(
        '/admin/update/{id}',
        [AdminController::class, 'update']
    );

    // HAPUS SISWA
    Route::delete(
        '/admin/delete/{id}',
        [AdminController::class, 'destroy']
    );

    // UBAH STATUS
    Route::put(
        '/admin/status/{id}',
        [AdminController::class, 'updateStatus']
    );

});