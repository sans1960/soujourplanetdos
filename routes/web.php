<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PageArticleController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Spatie\Honeypot\ProtectAgainstSpam;

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

Route::get('/', [FrontController::class,'index'])->name('index');
Route::get('destination/{destination}',[FrontController::class,'postsdestination'])->name('posts.destination');
Route::get('destination/{destination}/category/{category}',[FrontController::class,'postsDestCat'])->name('posts.destcat');
Route::get('post/{post}',[FrontController::class,'viewpost'])->name('posts.post');
Route::get('country/{country}',[FrontController::class,'postscountries'])->name('posts.countries');
Route::get('category/{category}',[FrontController::class,'postscategory'])->name('posts.categories');
Route::get('country/{country}/category/{category}',[FrontController::class,'postscountcat'])->name('posts.countcat');
Route::get('sites/pages',[PageArticleController::class,'allPages'])->name('sites');
Route::get('sites/pages/{page}',[PageArticleController::class,'pageArticles'])->name('sites.articles');
Route::get('sites/tags/{tag}',[PageArticleController::class,'pagesTag'])->name('tags.pages');
Route::get('/contact/destination/{dstination}/{slug}/subregion/{subregion}/country/{country}',[ContactController::class,'viewForm'])->name('contact');
Route::get('contact/article/{article}',[ContactController::class,'formArticle'])->name('contact.article');
Route::post('sendform',[ContactController::class,'sendForm'])->middleware(ProtectAgainstSpam::class)->name('sendform');
Route::post('sendformarticle',[ContactController::class,'sendFormArticle'])->middleware(ProtectAgainstSpam::class)->name('sendformarticle');

Route::get('/feed/europe', [RssFeedController::class,'rssEurope'])->name('feed.europe');
Route::get('/feed/caribbean', [RssFeedController::class,'rssCaribbean'])->name('feed.caribbean');
Route::get('/feed/oceania', [RssFeedController::class,'rssOceania'])->name('feed.oceania');
Route::get('/feed/southasia', [RssFeedController::class,'rssSouthAsia'])->name('feed.southasia');
Route::get('/feed/southamerica', [RssFeedController::class,'rssSouthAmerica'])->name('feed.southamerica');
Route::get('/feed/subsaharan', [RssFeedController::class,'rssSubsaharan'])->name('feed.subsaharan');
Route::get('/feed/maghreb', [RssFeedController::class,'rssMaghreb'])->name('feed.maghreb');
Route::get('/feed/northeastasia', [RssFeedController::class,'rssNorthEastAsia'])->name('feed.northeastasia');
Route::get('/feed/southeastasia', [RssFeedController::class,'rssSouthEastAsia'])->name('feed.southeastasia');
Route::get('/feed/centralasia', [RssFeedController::class,'rssCentralAsia'])->name('feed.centralasia');
Route::get('/feed/centralamerica', [RssFeedController::class,'rssCentralAmerica'])->name('feed.centralamerica');
Route::get('/feed/general', [RssFeedController::class,'rssGeneral'])->name('feed.general');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
