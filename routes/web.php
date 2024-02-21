<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'homepage']);

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/post_details/{id}',[HomeController::class,'PostDetails']);
Route::get('/creat_post',[HomeController::class,'CreatPost'])->middleware('auth');
Route::post('/add_post',[HomeController::class,'AddPost'])->middleware('auth');
Route::get('/my_post',[HomeController::class,'MyPost'])->middleware('auth');
Route::get('/delete_mypost/{id}',[HomeController::class,'DeleteMyPost'])->middleware('auth');
Route::get('/update_mypost_view/{id}',[HomeController::class,'UpdateMyPostView'])->middleware('auth');
Route::post('/update_mypost/{id}',[HomeController::class,'UpdateMyPost'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);
Route::get('/add_post',[AdminController::class,'addPost']);
Route::post('/add_post_db',[AdminController::class,'InsertPostDb']);

Route::get('/post_list',[AdminController::class,'PostList']);
Route::get('/post_delete/{id}',[AdminController::class,'PostDelete']);
Route::get('/post_update/{id}',[AdminController::class,'PostShow']);
Route::post('/post_update_edit/{id}',[AdminController::class,'PostUpdate']);

Route::get('/post_accept/{id}',[AdminController::class,'PostAccept']);
Route::get('/post_reject/{id}',[AdminController::class,'PostReject']);