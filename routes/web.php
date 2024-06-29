<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\PackageController;
use App\Http\Controllers\Backend\PackageDetailController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Frontend\DetailsController;
use App\Http\Controllers\Frontend\FrontendPackageController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// admin group middle ware 
Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');


    Route::post('/admin/profile/store', [AdminController::class, 'AdminPofileStore'])->name('admin.profile.store');


    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});

// homepage route 

Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::controller(HomePageController::class)->group(function () {
        Route::get('/edit/homepage', 'ManageHome')->name('update.homepage');
        Route::post('/update/homepage', 'UpdateHomePage')->name('update.homepage.details');

    });
    Route::controller(FooterController::class)->group(function () {
        Route::get('/edit/footer', 'ManageFooter')->name('update.footer');
        Route::post('/update/footer', 'UpdateFooter')->name('update.footer.details');

    });
    Route::controller(DetailsController::class)->group(function () {
        Route::get('/edit/aboutus', 'EditAboutUs')->name('edit.about.us');

        Route::post('/update/aboutus', 'UpdateAboutUs')->name('update.aboutus.details');
        Route::get('/contact/list', 'List')->name('contact.messages');

    });

    Route::controller(PackageController::class)->group(function () {
        Route::get('/manage/package/list', 'ManagePackageList')->name('manage.package.list');
        Route::post('/package/name/store', 'PackageNameStore')->name('package.name.store');
    });

    Route::controller(PackageDetailController::class)->group(function () {
        Route::get('/edit/package/{id}', 'EditPackage')->name('edit.package');
        Route::post('/update/package/{id}', 'UpdatePackage')->name('update.package');
        Route::get('/delete/package/{id}', 'DeletePackage')->name('delete.package');
        Route::get('/delete/saved/{id}', 'DeleteSavedPack')->name('delete.saved.pack');

    });
});






Route::controller(DetailsController::class)->group(function () {
    Route::get('/aboutus', 'Aboutus')->name('aboutus');
    Route::post('/getdata', 'Contact')->name('get.data');
    Route::get('/contactus', 'ContactUs')->name('contact.us');
    Route::get('/car', 'Car')->name('transport');

});

Route::controller(FrontendPackageController::class)->group(function () {
    Route::get('/all/package', 'AllPackage')->name('all.packages');
    Route::get('/package/details/{id}', 'PackageDetailPage');


});