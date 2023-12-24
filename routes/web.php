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
    SettingController,
    OrdersController,
    TypesController,
    BlogsController,
    AnalysticController,
    CategoryController,
    CommentController
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
//Handle logout
Route::prefix('/logout')->group(function () {
    Route::delete('/', [AuthenticationController::class, 'handleLogout'])->name("handle-logout");
});

//Handle search bar action
Route::get('books/search-name',[BooksController::class, 'searchName'])->name('books_search');
Route::get('blogs/search-name',[BlogsController::class, 'searchName'])->name('blogs_search');

Route::group([],function () {
    Route::prefix('/')->group(function () {
        //Home
        Route::get('/',[BooksController::class, 'userBooksHome'])->name("home");
        //Category
        Route::get('/category',[CategoryController::class,'indexUser'])->name("category");
        //About
        Route::get('/about',function () {
            return view('user/about');
        })->name("about");
        //Blog
        Route::get('/blog-detail/{id}',[BlogsController::class, 'useBlogDetail'])->name('blog_detail');
        Route::get('/blog',[BlogsController::class, 'userBlogs'])->name('blog');
        Route::get('/blog/{id}',[BlogsController::class, 'userTypeBlogs'])->name('blog_types');
        //Contact
        Route::get('/contact',function(){
            return view('user/contact');
        })->name("contact");
        //Book
        Route::prefix('/book')->group(function () {
            Route::get('/{id}',[BookController::class, 'index'])->name('book_detail');
        });
    });
});

//User access : 0-user, 1-admin
Route::group(['middleware'=>['auth','user-access:0']],function () {
    //Faq
    Route::prefix('/faq')->group(function () {
        Route::get('/',[FAQController::class, 'index'])->name('user_faqs');
        Route::post('/',[FAQController::class, 'store'])->name('user_faq_store');
    });
    //Cart
    Route::prefix('/cart')->group(function () {
        Route::get('/',[CartController::class, 'index'])->name('user_cart');
    });
    //Track Order
    Route::prefix('/track-order')->group(function () {
        Route::get('/',[TrackOrderController::class, 'index'])->name('user_track-order');
        Route::get('/{id}',[TrackOrderController::class, 'show'])->name('user_track-order_detail');
    });
    // Profile
    Route::prefix('/profile')->group(function () {
        Route::get('/',[ProfileController::class, 'index'])->name('user_profile');
        Route::put('/account',[ProfileController::class, 'changePassword'])->name('user_password_update');
        Route::put('/{id}',[ProfileController::class, 'update'])->name('user_profile_update');
    });
    //Bill
    Route::get('/bill-detail/{id}', function(){
        return view('user/bill_detail');
    })->name("bill-detail");

    //Tạo comment
    Route::prefix('/comment')->group(function () {
        Route::post('/',[CommentController::class, 'store'])->name('customer-comment');
    });
});


// Admin
Route::group(['middleware'=>['auth','user-access:1']],function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/',[AdminController::class, 'index'])->name('overview');
        Route::get('/analystics',[AnalysticController::class,'index'])->name('admin_analystics');
        Route::get('/setting',[SettingController::class, 'indexAdmin'])->name('admin_setting');
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
        });
        //Faq route
        Route::prefix('/faqs')->group(function () {
            Route::get('/',[FAQController::class, 'index_admin'])->name('admin_faqs');
            Route::get('/edit/{id}',[FAQController::class, 'edit'])->name('admin_faqs_edit');
            Route::put('/edit/{id}',[FAQController::class, 'update'])->name('admin_faqs_update');
            Route::delete('/{id}',[FAQController::class, 'destroy'])->name('admin_faqs_destroy');
        });
        //Orders
        Route::prefix('/orders')->group(function () {
            Route::get('/',[OrdersController::class, 'indexAdmin'])->name('admin_orders');
            Route::put('/{id}',[OrdersController::class, 'update'])->name('admin_order_update_status');
            Route::get('/show/{id}',[OrdersController::class, 'show'])->name('admin_order_show');
            Route::delete('/{id}',[OrdersController::class, 'destroy'])->name('admin_orders_destroy');
        });
        //Blog
        Route::prefix('/blogs')->group(function(){
            Route::get('/',[BlogsController::class,'indexAdmin'])->name('admin_blogs');
            Route::post('/ckeditor-upload',[BlogsController::class,'ckeditorUploadImage'])->name('ckeditor_upload');
            Route::post('/create',[BlogsController::class,'store'])->name('admin_blog_store');
            Route::get('/edit/{id}',[BlogsController::class,'edit'])->name('admin_blog_edit_page');
            Route::put('/edit/{id}',[BlogsController::class,'update'])->name('admin_blog_update');
            Route::delete('/{id}',[BlogsController::class,'destroy'])->name('admin_blog_destroy');
            Route::get('/create',[BlogsController::class,'create'])->name('admin_blog_create_page');
            Route::post('/types_blog',[BlogsController::class, 'typesBlogStore'])->name('admin_types_blog_store');
        });
        //Search
        Route::get('customers/search-name',[UsersController::class, 'searchName'])->name('admin_customers_search');
        Route::get('faqs/search-name',[FAQController::class, 'searchName'])->name('admin_faqs_search');
        Route::get('orders/search-name',[FAQController::class, 'searchName'])->name('admin_faqs_search');
        //Setting
        Route::put('/account',[ProfileController::class, 'changePassword'])->name('admin_password_update');
        Route::put('/{id}',[ProfileController::class, 'update'])->name('admin_profile_update');

    });
});
