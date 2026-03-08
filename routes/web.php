<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievement.index');
Route::get('/prestasi/{category}', [AchievementController::class, 'filter'])->name('achievement.filter');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/guru', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

// Protected Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/announcements', AnnouncementController::class);
    Route::resource('/achievements', AdminAchievementController::class);
    Route::resource('/galleries', AdminGalleryController::class);
    Route::post('/galleries/{gallery}/add-photos', [AdminGalleryController::class, 'addPhotos'])->name('galleries.add-photos');
    Route::delete('/galleries/{gallery}/photos/{photo}', [AdminGalleryController::class, 'deletePhoto'])->name('galleries.delete-photo');
    Route::resource('/videos', VideoController::class);
    Route::resource('/teachers', AdminTeacherController::class);
    Route::resource('/sliders', SliderController::class);
    Route::resource('/users', UserController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
