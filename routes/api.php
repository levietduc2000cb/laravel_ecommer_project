<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{MailController, TrackOrderController, CommentController, TypesController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/send-email',[MailController::class,'index'])->name('send-email');
Route::post('/send-email-join-us',[MailController::class,'sendEmailJoinUs'])->name('send-email-join-us');
Route::post('/send-email-contact',[MailController::class,'sendEmailContact'])->name('send-email-contact');

Route::prefix('/track-order')->group(function () {
    Route::post('/',[TrackOrderController::class, 'store'])->name('user_track-order_store');
});

Route::prefix('/comments')->group(function () {
    Route::get('/',[CommentController::class, 'show'])->name('get-comments');
});

Route::prefix('/types')->group(function () {
    Route::get('/',[TypesController::class, 'show_api'])->name('get-types-api');
});
