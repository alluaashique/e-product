<?php

use App\Http\Middleware\AdminMiddleware;

//AdminController
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\SpecificationController;
use App\Http\Controllers\Admin\ProductController;


//UserController
use App\Http\Controllers\User\BlogController as UserBlogController;
use App\Http\Controllers\User\ContactusController as UserContactusController;
use App\Http\Controllers\User\HomeController as UserHomeController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
   
    Route::get('/blog/category', [BlogCategoryController::class, 'index'])->name('blog.category.index');
    Route::get('/blog/category/create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
    Route::post('/blog/category', [BlogCategoryController::class, 'store'])->name('blog.category.store');
    Route::get('/blog/category/{id}/edit', [BlogCategoryController::class, 'edit'])->name('blog.category.edit');
    Route::put('/blog/category/{id}', [BlogCategoryController::class, 'update'])->name('blog.category.update');
    Route::delete('/blog/category/{id}', [BlogCategoryController::class, 'destroy'])->name('blog.category.destroy');

   
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');


    Route::get('/contact-us', [ContactusController::class, 'index'])->name('contact-us.index');
    Route::get('/contact-us/create', [ContactusController::class, 'create'])->name('contact-us.create');
    Route::post('/contact-us', [ContactusController::class, 'store'])->name('contact-us.store');
    Route::get('/contact-us/{id}/edit', [ContactusController::class, 'edit'])->name('contact-us.edit');
    Route::put('/contact-us/{id}', [ContactusController::class, 'update'])->name('contact-us.update');
    Route::delete('/contact-us/{id}', [ContactusController::class, 'destroy'])->name('contact-us.destroy');

    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('product-category.index');
    Route::get('/product-category/create', [ProductCategoryController::class, 'create'])->name('product-category.create');
    Route::post('/product-category', [ProductCategoryController::class, 'store'])->name('product-category.store');
    Route::get('/product-category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product-category.edit');
    Route::put('/product-category/{id}', [ProductCategoryController::class, 'update'])->name('product-category.update');
    Route::delete('/product-category/{id}', [ProductCategoryController::class, 'destroy'])->name('product-category.destroy');

    Route::get('/specification', [SpecificationController::class, 'index'])->name('specification.index');
    Route::get('/specification/create', [SpecificationController::class, 'create'])->name('specification.create');
    Route::post('/specification', [SpecificationController::class, 'store'])->name('specification.store');
    Route::get('/specification/{id}/edit', [SpecificationController::class, 'edit'])->name('specification.edit');
    Route::put('/specification/{id}', [SpecificationController::class, 'update'])->name('specification.update');
    Route::delete('/specification/{id}', [SpecificationController::class, 'destroy'])->name('specification.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

});


Route::get('/', [UserHomeController::class, 'index'])->name('index');
Route::get('/about', [UserHomeController::class, 'about'])->name('about');
Route::get('/causes', [UserHomeController::class, 'causes'])->name('causes');
Route::get('/donate', [UserHomeController::class, 'donate'])->name('donate');

Route::get('/blog', [UserBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [UserBlogController::class, 'show'])->name('blog.show');

Route::post('/blog/comment/{id}', [UserBlogController::class, 'blogCommentStore'])->name('blog.comment.store');


Route::get('/contact-us', [UserContactusController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [UserContactusController::class, 'store'])->name('contact-us.store');
// Route::get('/contact-us/create', [UserContactusController::class, 'create'])->name('contact-us.create');
// Route::post('/contact-us', [UserContactusController::class, 'store'])->name('contact-us.store');
// Route::get('/contact-us/{id}', [UserContactusController::class, 'show'])->name('contact-us.show');
// Route::get('/contact-us/{id}/edit', [UserContactusController::class, 'edit'])->name('contact-us.edit');
// Route::put('/contact-us/{id}', [UserContactusController::class, 'update'])->name('contact-us.update');
// Route::delete('/contact-us/{id}', [UserContactusController::class, 'destroy'])->name('contact-us.destroy');


require __DIR__.'/auth.php';
