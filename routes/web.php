<?php

use App\Http\Controllers\CarruselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PostController;
use App\Models\Carrusel;
use App\Models\Job;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('error', function () {
    abort('404');
});

Route::get('/', function () {
    $shareButtons = \Share::page(
        url('/'),
        'Noticias recientes',
    )
    ->facebook()
    ->twitter()
    ->linkedin()
    ->telegram()
    ->whatsapp()
    ->reddit();
    $news = Post::where('status', 3)->latest('id')->limit(6)->get();
    $carrusels = Carrusel::where('status', '1')->orderBy('id', 'desc')->get();
    if($news){
        return view('welcome', compact('news','carrusels','shareButtons'));
    }
    return view('welcome', compact('carrusels'));
});
Route::get('/post/{slug}', [PostController::class, 'post'])->name('posts.slug');
Route::get('/noticias', [PostController::class, 'posts'])->name('posts.all');
Route::get('/cursos', [PostController::class, 'posts'])->name('posts.all');
Route::get('/tutoriales', [PostController::class, 'posts'])->name('posts.all');
Route::get('/tramites', [PostController::class, 'posts'])->name('posts.all');
Route::get('/category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('/tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    //Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/posts/{id}/publish', [PostController::class, 'publish'])->name('posts.publish');
    Route::get('/posts/{id}/cancel', [PostController::class, 'cancel'])->name('posts.cancel');
    Route::get('/posts/{id}/fail', [PostController::class, 'fail'])->name('posts.fail');
    Route::get('/posts/{id}/approve', [PostController::class, 'approve'])->name('posts.approve');
    Route::get('/posts/{id}/disabled', [PostController::class, 'disabled'])->name('posts.disabled');
    Route::group(['middleware' => ['auth', 'role:editor|admin']], function () {
        Route::resource('posts', PostController::class);

        Route::group(['middleware' => ['auth', 'role:admin']], function () {

            /**
             * User Routes
             */
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'UserController@index')->name('users.index');
                Route::get('/create', 'UserController@create')->name('users.create');
                Route::post('/create', 'UserController@store')->name('users.store');
                Route::get('/{user}/show', 'UserController@show')->name('users.show');
                Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
                Route::patch('/{user}/update', 'UserController@update')->name('users.update');
                Route::delete('/{user}/delete', 'UserController@destroy')->name('users.destroy');
            });

            /**
             * User Routes
             */

            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('carrusels', CarruselController::class);
            Route::resource('institutions', InstitutionController::class);
            Route::resource('codes', CodeController::class);
        });
    });
});
Route::get('config', function () {
    dd(config('institution'));
});
