<?php

use App\Http\Controllers\Api\ImageController;
//use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ContactUsController;

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoureseController;
use App\Http\Controllers\Web\ScheduleController;
use Illuminate\Support\Facades\Artisan;

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


// Route::get('/video/{name}',[VideoController::class, 'videoStream']);
 Route::get('/image/{image}',[ImageController::class, 'index']);
// Route::get('/create.role',[RoleController::class, 'createRole']);
// Route::get('/assign.role',[RoleController::class, 'assignRole']);


Route::get('/clear-cache', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('queue:restart');
    Artisan::call('optimize:clear');
    //	dd(env('MAIL_USERNAME'));
    return "Cache is cleared";
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('Users.splashscreen');
    })->name('splash');
    Route::get('/register', function () {
        return view('Users.Auth.register');
    })->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.attempt');
    Route::get('/login', function () {
        return view('Users.Auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/approval', function () {
        return view('Users.approval_block');
    })->name('vnotice');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'approval'], function () {

        Route::get('/home', function () {
            return view('Users.Panel.dashboard');
        })->name('home');
        Route::get('/Latest-News', function () {
            return view('Users.Panel.latest_news');
        })->name('Latest-News');
        // Route::get('/Latest-News',[NewsController::class,'get_news'])->name('Latest-News');
        Route::get('/Key-Practices', function () {
            return view('Users.Panel.key_practices');
        })->name('Key-Practices');
        Route::get('/Roles', function () {
            return view('Users.Panel.roles');
        })->name('Roles');
        Route::get('/My-Courses', [CoureseController::class, 'get_courses'])->name('My-Courses');
        Route::get('/Glossary', function () {
            return view('Users.Panel.glossary');
        })->name('Glossary');
        Route::get('/dashboard', function () {
            return view('Users.Panel.dashboard');
        })->name('user.dashboard');
        Route::get('/chat', [UserController::class, 'inbox'])->name('user.chat');
        Route::get('/Calender', function () {
            return view('Users.Panel.calender');
        })->name('user.chat');
        Route::get('Conversation/{user_id}/{name}', [UserController::class, 'conversation'])->name('conversation');

        Route::get('Chapters/{course_id}', [CourseChapterController::class, 'getChapter'])->name('Chapters');
        Route::get('Chapter-Video/{course_id}/{chapter_id}', [CourseChapterController::class, 'chapter_video'])->name('Chapter-Video');
        Route::post('/User-Search', [UserController::class, 'UserSerachForChat'])->name('User-Search');
        Route::post('/Update-Profile', [UserController::class, 'profile_update'])->name('Update-Profile');
        Route::post('/Cousrse_Search', [CoureseController::class, 'Cousrse_Search'])->name('Cousrse_Search');

        
        
        Route::group(['prefix'=>'schedule'],function(){
            Route::get('/',[ScheduleController::class, 'index']);
            Route::post('/store',[ScheduleController::class, 'store']);
            Route::post('/update',[ScheduleController::class, 'update']);
            Route::get('/delete/{UUID}',[ScheduleController::class,'destroy']);
        });
    });
});
Route::post('Contact-Us', [ContactUsController::class, 'contact_us'])->name('Contact-Us');


Route::get('/admin/{path?}', function () {
    return view('Admin.app');
})->where('path', '.*');
