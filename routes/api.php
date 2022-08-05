<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CoureseController;
use App\Http\Controllers\Api\CourseChapterController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/login',[AuthController::class, 'Login']);


Route::group(['middleware'=>'auth:sanctum'],function() {
    Route::get('/auth.data',[AuthController::class, 'getUserData']);
    Route::post('/update.profile',[AuthController::class, 'updateProfile']);
    Route::post('/verify.user',[AuthController::class, 'verifyUser']);
    Route::get('/logout',[AuthController::class, 'Logout']);
    Route::group(['prefix'=>'users'],function(){
        Route::get('/',[UserController::class,'index']);
        Route::get('total_users',[UserController::class,'TotalUsers']);
        Route::post('create',[UserController::class,'create']);
        Route::get('/stat.change/{id}',[UserController::class,'StatusChange']);
        Route::post('/change.password',[UserController::class,'ChangePassword']);
        Route::get('/verify/{id}',[UserController::class,'VerifyUser']);
    });
    Route::group(['prefix'=>'courses'],function(){
        Route::get('/',[CoureseController::class, 'index']);
        Route::get('total_courses',[CoureseController::class, 'TotalCourses']);
        Route::get('/select',[CoureseController::class, 'select']);
        Route::post('store',[CoureseController::class, 'store']);
        Route::post('update',[CoureseController::class, 'update']);
        Route::get('/delete/{id}',[CoureseController::class, 'delete']);
    });
    Route::group(['prefix'=>'contact_us'],function(){
        Route::get('/',[ContactUsController::class, 'index']);
    });
});
