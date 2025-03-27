<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route For posts.blade.php
Route::get('/posts', function () {
    return view('posts');  
})->name('posts.index');

// Route For welcome.blade.php
Route::get('/welcome', function () {
    return view('welcome');  
})->name('welcome.index');

// Route For signoutpage.blade.php
Route::get('/signoutpage', function () {
    return view('signoutpage');  
})->name('signoutpage.index');

// Route For loginpage.blade.php
Route::get('/loginpage', function () {
    return view('loginpage');  
})->name('loginpage.index');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/org", OrgController::class )->middleware(['auth']);

require __DIR__.'/auth.php';


