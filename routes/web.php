<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgController;
use App\Http\Controllers\ArticleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $articles = app(App\Http\Controllers\ArticleController::class)->index();
    return view('welcome', ['articles' => $articles]);
})->name('home'); // Updated route for '/'

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route For posts.blade.php
Route::get('/posts', function () {
    return view('posts');  
})->name('posts.index');

// // Route For welcome.blade.php
// Route::get('/welcome', function () {
//     return view('welcome');  
// })->name('welcome.index');

Route::get('/welcome', function () {
    $articles = app(App\Http\Controllers\ArticleController::class)->index();
    return view('welcome', ['articles' => $articles]);
})->name('welcome.index'); // Updated route for '/welcome'

// Route For signoutpage.blade.php
Route::get('/signoutpage', function () {
    return view('signoutpage');  
})->name('signoutpage.index');

// Route For loginpage.blade.php
Route::get('/loginpage', function () {
    return view('loginpage');  
})->name('loginpage.index');

Route::middleware('auth')->group(function () {
    Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article', [ProfileController::class, 'edit'])->name('article.edit');
    Route::patch('/article', [ProfileController::class, 'update'])->name('article.update');
    Route::delete('/article', [ProfileController::class, 'destroy'])->name('article.destroy');
}); // needs work to properly implement editing and deleting articles

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/org", OrgController::class )->middleware(['auth']);

require __DIR__.'/auth.php';


