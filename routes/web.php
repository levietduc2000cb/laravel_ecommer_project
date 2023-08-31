<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthenticationController,
    BookController,
    CartController,
    TrackOrderController,
    FAQController,
    AdminController,
    ProfileController,
    BooksController,
    UsersController,
    OrdersController,
    SupportController,
    TypesController,
};
use App\Models\Users;

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

Route::prefix('/login')->group(function () {
    Route::get('/', [AuthenticationController::class, 'login'])->name("login");
    Route::post('/', [AuthenticationController::class, 'handleLogin'])->name("handle-login");
});
//Handle regitser
Route::prefix('/register')->group(function () {
    Route::get('/', [AuthenticationController::class, 'register'])->name("register");
    Route::post('/', [AuthenticationController::class, 'handleRegister'])->name("handle-register");
});

// Route User
Route::get('/', function () {
    return view('user/home');
})->name("home");


Route::get('/category',function () {
    return view('user/category');
})->name("category");

Route::get('/about',function () {
    return view('user/about');
})->name("about");

Route::get('/blog',function(){
    return view('user/blog');
})->name("blog");

Route::get('/contact',function(){
    return view('user/contact');
})->name("contact");

Route::prefix('/book')->group(function () {
    Route::get('/{id}',[BookController::class, 'index'])->name('book_detail');
});

Route::prefix('/cart')->group(function () {
    Route::get('/',[CartController::class, 'index'])->name('cart');
});

Route::prefix('/track-order')->group(function () {
    Route::get('/',[TrackOrderController::class, 'index'])->name('track-order');
});

Route::prefix('/')->group(function () {
    Route::prefix('/faq')->group(function () {
        Route::get('/',[FAQController::class, 'index'])->name('user_faqs');
        Route::post('/',[FAQController::class, 'store'])->name('user_faq_store');
    });
});

Route::prefix('/profile')->group(function () {
    Route::get('/',[ProfileController::class, 'index'])->name('profile');
});

Route::get('/bill-detail/{id}', function(){
    return view('user/bill_detail');
})->name("bill-detail");

Route::get('books/search-name',[BooksController::class, 'searchName'])->name('admin_books_search');
Route::get('customers/search-name',[UsersController::class, 'searchName'])->name('admin_customers_search');
Route::get('faqs/search-name',[FAQController::class, 'searchName'])->name('admin_faqs_search');

// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminController::class, 'index'])->name('overview');
    Route::get('/analystics',function(){return view('admin/analystics');})->name('analystics');
    //Type route
    Route::prefix('/type')->group(function () {
        Route::post('/',[TypesController::class, 'store'])->name('admin_types_store');
    });
    //Books route
    Route::prefix('/book')->group(function () {
        Route::get('/',[BooksController::class, 'index'])->name('admin_books');
        Route::post('/',[BooksController::class, 'store'])->name('admin_books_store');
        Route::get('/edit/{id}',[BooksController::class, 'edit'])->name('admin_books_edit');
        Route::put('/edit/{id}',[BooksController::class, 'update'])->name('admin_books_update');
        Route::delete('/{id}',[BooksController::class, 'destroy'])->name('admin_books_destroy');
    });
    //Customer route
    Route::prefix('/customers')->group(function () {
        Route::get('/',[UsersController::class, 'index'])->name('admin_customers');
        Route::get('/edit/{id}',[UsersController::class, 'edit'])->name('admin_customers_edit');
        Route::put('/edit/{id}',[UsersController::class, 'update'])->name('admin_customers_update');
        Route::delete('/{id}',[UsersController::class, 'destroy'])->name('admin_customers_destroy');
        Route::get('/setting',[UsersController::class, 'indexAdmin'])->name('admin_setting');
    });
    //Faq route
    Route::prefix('/faqs')->group(function () {
        Route::get('/',[FAQController::class, 'index_admin'])->name('admin_faqs');
        Route::get('/edit/{id}',[FAQController::class, 'edit'])->name('admin_faqs_edit');
        Route::put('/edit/{id}',[FAQController::class, 'update'])->name('admin_faqs_update');
        Route::delete('/{id}',[FAQController::class, 'destroy'])->name('admin_faqs_destroy');
    });
    Route::prefix('/orders')->group(function () {
        Route::get('/',[OrdersController::class, 'indexAdmin'])->name('admin_orders');
    });
});
