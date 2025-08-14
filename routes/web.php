<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostContoller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', fn () => view('welcome'))->name('welcome') ;

Route::middleware('guest')->group(function () {
    Route::get('/register',[RegisterController::class , 'index' ])->name('register') ;// the route for the register page
    Route::post('/register',[RegisterController::class , 'check' ])->name('register');// the route for data registeration
    Route::get('/login',[LoginController::class ,'index'])->name('login') ;//the route for login page from url
    Route::post('/login',[LoginController::class ,'login'])->name('login');//the route for login page from post method after register
});
Route::middleware('auth')->group(function () {
    Route::post('/posts',[PostContoller::class,'index'])->name('posts');
    Route::get('/posts',[PostContoller::class,'index'])->name('posts')  ;//for the links 
    Route::get('/posts/creat',[PostContoller::class,'create'])->name('creatpost')  ;
    Route::post('/posts/creat',[PostContoller::class,'store'])->name('creatpost');//to store the post
    Route::get('posts/{post}',[PostContoller::class,'show'])->name('showpost')  ;;//to show specific post
    Route::get('/post/edit/{post}',[PostContoller::class,'edit'])->name('edit')  ;//to edit post
    Route::put('/post/edit/{post}',[PostContoller::class,'update'])->name('update.post');//to update post
    Route::delete('/post/edit/{post}',[PostContoller::class,'delete'])->name('delete.post');//to delete post
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});