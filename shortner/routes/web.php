<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shortLinkController;
use App\Models\ShortLink;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('generate-shorten-link', [shortLinkController::class, 'index']);
Route::post('generate-shorten-link', [shortLinkController::class, 'store'])->name('generate.shorten.link.post');
Route::get('{code}', [shortLinkController::class, 'ShortLink'])->name('shorten.link');

