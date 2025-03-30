<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrgController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ApprovalMiddleware;

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

// // Route For posts.blade.php
// Route::get('/posts', function () {
//     return view('posts');  
// })->name('posts.index');

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/org", OrgController::class )->middleware(['auth']);

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware(['auth', ApprovalMiddleware::class])->group(function () {
    // When authentication works use this isntead for posts
    Route::get('/posts', function () {
        $userId = auth()->id(); // Get the authenticated user's ID
        $articles = app(App\Http\Controllers\ArticleController::class)->posts($userId);
        return view('posts', ['articles' => $articles]);  
    })->name('posts.index');
    
    Route::post('/posts', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::patch('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/promote/{id}', [AdminController::class, 'promote'])->name('admin.promote');
});

require __DIR__.'/auth.php';


