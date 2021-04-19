<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/slider', [SliderController::class, 'index'])->name('slider');
Route::resource('slider', SliderController::class);
Route::resource('about', AboutusController::class);
Route::resource('service', ServiceController::class);
Route::resource('category', CategoryController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('profile', ProfileController::class);
Route::resource('client', ClientController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('team', TeamController::class);


// Contact Page
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contactstore');


//portfolio details

Route::get('/portfolio-details/{id} ', [App\Http\Controllers\FrontendController::class, 'portfolio_details'])->name('portfolio_details');
