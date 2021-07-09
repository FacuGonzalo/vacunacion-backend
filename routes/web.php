<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModeradorController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
    return view('welcome');
});

// RUTAS DE CENTROS

Route::get('centro', [CentroController::class, 'index'])->middleware(['auth'])->name('centro.index');

Route::get('/centro/create', [CentroController::class, 'create'])->middleware(['auth', 'admin'])->name('centro.create');

Route::get('/centro/{centro}', [CentroController::class, 'show'])->middleware(['auth'])->name('centro.show');

Route::post('centro', [CentroController::class, 'store'])->middleware(['auth', 'admin'])->name('centro.store');

Route::get('centro/{centro}/edit', [CentroController::class, 'edit'])->middleware(['auth', 'admin'])->name('centro.edit');

Route::put('centro/{centro}', [CentroController::class, 'update'])->middleware(['auth', 'admin'])->name('centro.update');

Route::delete('centro/{centro}', [CentroController::class, 'destroy'])->middleware(['auth', 'admin'])->name('centro.destroy');

// RUTAS DE CALIFICACIONES

Route::get('calificacion/{centro}', [CalificacionController::class, 'index'])->middleware(['auth'])->name('calificacion.index');

Route::post('calificacion/{centro}', [CalificacionController::class, 'store'])->middleware(['auth'])->name('calificacion.store');

Route::get('calificacion/{centro}/create', [CalificacionController::class, 'create'])->middleware(['auth', 'admin'])->name('calificacion.create');

Route::delete('calificacion/{calificacion}', [CalificacionController::class, 'destroy'])->middleware(['auth', 'moderador'])->name('calificacion.destroy');

// RUTAS DE USUARIOS

Route::get('user', [RegisteredUserController::class, 'index'])->middleware(['auth', 'admin'])->name('user.index');

Route::get('/user/{usuario}', [RegisteredUserController::class, 'show'])->middleware(['auth', 'admin'])->name('user.show');

Route::get('user/{usuario}/edit', [RegisteredUserController::class, 'edit'])->middleware(['auth', 'admin'])->name('user.edit');

Route::put('user/{usuario}', [RegisteredUserController::class, 'update'])->middleware(['auth', 'admin'])->name('user.update');

Route::delete('user/{usuario}', [RegisteredUserController::class, 'destroy'])->middleware(['auth', 'admin'])->name('user.destroy');


Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');

Route::get('moderador', [ModeradorController::class, 'index'])->middleware(['auth', 'moderador'])->name('moderador');

// RUTAS DE REESTABLECIMIENTO DE CONTRASEÑA

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

require __DIR__ . '/auth.php';
