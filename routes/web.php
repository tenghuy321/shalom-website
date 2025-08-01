<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Admin\AboutListController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PartnerController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ServiceListController;
use App\Http\Controllers\Frontend\IndustryController;
use App\Http\Controllers\Admin\EventBackendController;
use App\Http\Controllers\Admin\ClientBackendController;
use App\Http\Controllers\Admin\PartnerBackendController;
use App\Http\Controllers\Admin\IndustryBackendController;

// frontend
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service-details');

// Route::get('/service-details', [ServiceDetailsController::class, 'details'])->name('service-details');
Route::get('/our-partners', [PartnerController::class, 'index'])->name('our-partners');
Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/industry', [IndustryController::class, 'index'])->name('industry');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/book-now', [BookingController::class, 'sendBooking'])->name('book.now');


// lang
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // service
    Route::resource('/servicelist', ServiceListController::class)->except(['destroy', 'show']);
    Route::post('/servicelist/reorder', [ServiceListController::class, 'reorder'])->name('servicelist.reorder');
    Route::get('servicelist/delete/{id}', [ServiceListController::class, 'delete'])->name('servicelist.delete');

    Route::resource('/team', TeamController::class)->except(['destroy', 'show']);
    Route::post('/team/reorder', [TeamController::class, 'reorder'])->name('team.reorder');
    Route::get('team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');

    Route::resource('/partner', PartnerBackendController::class)->except(['destroy', 'show']);
    Route::post('/partner/reorder', [PartnerBackendController::class, 'reorder'])->name('partner.reorder');
    Route::get('partner/delete/{id}', [PartnerBackendController::class, 'delete'])->name('partner.delete');

    Route::resource('/client-backend', ClientBackendController::class)->except(['destroy', 'show']);

    Route::resource('/industry-backend', IndustryBackendController::class)->except(['destroy', 'show']);
    Route::post('/industry-backend/reorder', [IndustryBackendController::class, 'reorder'])->name('industry-backend.reorder');
    Route::get('industry-backend/delete/{id}', [IndustryBackendController::class, 'delete'])->name('industry-backend.delete');

    Route::resource('/hero', HeroController::class)->except(['destroy', 'show']);
    Route::resource('/aboutlist', AboutListController::class)->except(['destroy', 'show']);
    Route::resource('/contact-us', ContactUsController::class)->except(['destroy', 'show']);

    Route::resource('/faq', FaqController::class)->except(['destroy', 'show']);
    Route::post('/faq/reorder', [FaqController::class, 'reorder'])->name('faq.reorder');
    Route::get('faq/delete/{id}', [FaqController::class, 'delete'])->name('faq.delete');

    Route::resource('/certificate', CertificateController::class)->except(['destroy', 'show']);
    Route::post('/certificate/reorder', [CertificateController::class, 'reorder'])->name('certificate.reorder');
    Route::get('certificate/delete/{id}', [CertificateController::class, 'delete'])->name('certificate.delete');

    Route::resource('/event-backend', EventBackendController::class)->except(['destroy', 'show']);
    Route::post('/event-backend/reorder', [EventBackendController::class, 'reorder'])->name('event-backend.reorder');
    Route::get('event-backend/delete/{id}', [EventBackendController::class, 'delete'])->name('event-backend.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
