<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/register', function () {
//     return view('error');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/blog/create', function () {
    return view('blog.create');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    // route for blog
    Route::get('/dashboard/blog', [BlogController::class, 'blog'])->name('blog.index');
    // Route::get('/dashboard', [ContactController::class, 'dash']);
    Route::delete('/dashboard/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
    Route::post('/dashboard/blog/', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/dashboard/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/dashboard/blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/dashboard/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    // route for profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //route for service
    Route::get('/dashboard/services/create', [ServiceController::class, 'create']);
    Route::post('/dashboard/services/save', [ServiceController::class, 'save'])->name('service.create');
    Route::delete('/dashboard/services/{id}', [ServiceController::class, 'delete'])->name('service.destroy');
    Route::get('/dashboard/services/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/dashboard/service/update/{service}', [ServiceController::class, 'update'])->name('service.update');
    //route for project
    Route::controller(ProjectController::class)->group(function () {
        route::get('/dashboard/projects', 'project')->name('project.index');
        route::get('/dashboard/projects/create', 'create')->name('project.create');
        route::post('/dashboard/projects/create', 'save')->name('project.save');
        route::get('/dashboard/projects/edit/{id}', 'edit')->name('project.edit');
        Route::put('/dashboard/projects/update/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/dashboard/projects/{id}', [ProjectController::class, 'delete'])->name('project.delete');


    });


    Route::controller(ServiceController::class)->group(function () {
        route::get('/dashboard/services', 'service')->name('service.index');
    });

    //contact page update and show routes
    Route::get('/dashboard/contact', [ContactController::class, 'show'])->name('contact.index');
    Route::post('/dashboard/contact', [ContactController::class, 'update'])->name('contact.update');


    //setting or about page update and show routes

    Route::get('/dashboard/settings', [SettingController::class, 'show'])->name('setting.index');
    Route::post('/dashboard/settings', [SettingController::class, 'update'])->name('setting.update');

    // for user
    Route::post('/dashboard/settings', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/dashboard/users/{id}', [UserController::class, 'delete'])->name('user.destroy');
    Route::get('/dashboard/users/', [UserController::class, 'index'])->name('user.index');
    Route::get('/dashboard/register/', [UserController::class, 'register'])->name('user.register');



});


//routs for front side

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/view/{id}', [BlogController::class, 'view'])->name('blog.view');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/view/{id}', [ProjectController::class, 'view'])->name('project.view');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.store');

require __DIR__ . '/auth.php';


// Route::get('test', function() {
//     $response = \Illuminate\Support\Facades\Http::get('https://shot.screenshotapi.net/screenshot', [
//         'token' => 'BNH4E0A-PQ14H4A-PYV0DDP-5GKHR09',
//         'url' => 'https://mohrain.com',
//         // 'output' => 'image'
//     ]);
//     // return $response;

//     return $response->json();
// });
