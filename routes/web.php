<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\ExtracurricullarController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\PrestasionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('ppdb', [FrontController::class, 'register'])->name('ppdb.register');
Route::post('ppdb', [FrontController::class, 'store'])->name('ppdb.store');
Route::get('daftar-pengajar',[FrontController::class, 'teacher'])->name('front.teacher');
Route::get('hubungi-kami',[FrontController::class, 'contact'])->name('front.contact');

Route::get('pengumuman',[FrontController::class, 'announcement'])->name('front.announcement');
Route::get('pengumuman/{announcement:slug}',[FrontController::class, 'announcementDetail'])->name('front.announcement.detail');

Route::get('berita',[FrontController::class,'news'])->name('front.news');
Route::get('berita/{news:slug}',[FrontController::class,'newsDetail'])->name('front.news.detail');
Route::get('kategori/{category:slug}',[FrontController::class,'newsCategory'])->name('front.news.category');

Route::get('ekstrakulikuler', [FrontController::class,'esktrakulikuler'])->name('front.extrakulikuler');

Route::get('kegiatan',[FrontController::class, 'activity'])->name('front.activity');
Route::get('kegiatan/{activity:slug}',[FrontController::class, 'activityDetail'])->name('front.activityDetail');


Route::get('prestasi', [FrontController::class, 'prestasi'])->name('front.prestasion');
Route::get('prestasi/{prestasion:slug}', [FrontController::class, 'prestasiDetail'])->name('front.prestasionDetail');

Route::middleware(['guest'])->group(function(){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');
});



Route::middleware(['auth'])->group(function(){

    Route::post('logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('student/{id}/download', [StudentController::class, 'downloadStudentData'])->name('student.download');

    Route::prefix('student')->name('student.')->group(function(){
        Route::resource('ppdb', StudentController::class);

        Route::get('ppdb/{student}/edit-student',[StudentController::class, 'editStudent'])->name('edit.student');
        Route::put('ppdb/{student}/update-student',[StudentController::class, 'updateStudent'])->name('update.student');

        Route::get('ppdb/{student}/edit-parent',[StudentController::class, 'editParent'])->name('edit.parent');
        Route::put('ppdb/{parent}/update-parent',[StudentController::class, 'updateParent'])->name('update.parent');

        Route::get('ppdb/{student}/edit-school',[StudentController::class,'editSchool'])->name('edit-school');
        Route::put('ppdb/{school}/update-school',[StudentController::class,'updateSchool'])->name('update-school');

        Route::get('ppdb/{student}/edit-wali', [StudentController::class,'editCustodian'])->name('edit.wali');
        Route::put('ppdb/{custodian}/update-wali', [StudentController::class,'updateCustodian'])->name('update.wali');

        Route::get('ppdb/{student}/update-lapiran', [StudentController::class,'editAttactment'])->name('edit.attactment');
        Route::get('ppdb/{student}/update-orangtua-siswa', [StudentController::class,'editStudentParent'])->name('edit.studentParent');
        Route::get('ppdb/{student}/student', [StudentController::class,'editStudentParent'])->name('edit.studentParent');
    });

    
    Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->name('admin.')->group(function(){
            Route::resource('category',CategoryController::class);
            Route::resource('degree', DegreeController::class);
            Route::resource('teacher', TeacherController::class);
            Route::resource('news', NewsController::class);
            Route::resource('extracurricullar', ExtracurricullarController::class);
            Route::resource('banner', BannerController::class);
            Route::resource('announcement', AnnouncementController::class);
            Route::resource('user', UserController::class);
            Route::resource('activity', ActivityController::class);
            Route::resource('prestasion', PrestasionController::class);

            Route::get('ppdb', [PpdbController::class,'index'])->name('ppdb.index');
            Route::delete('ppdb/{user}', [PpdbController::class,'destroy'])->name('ppdb.destroy');

            Route::put('ppdb/status/{id}', [PpdbController::class,'statusUpdate'])->name('ppdb.status.update');
            Route::get('ppdb/{student}', [PpdbController::class,'detailStudent'])->name('ppdb.detail.student');

            Route::put('ppdb/student/status-null/{student}',[PpdbController::class, 'statusNullUpdate'])->name('ppdb.student.null');
            Route::put('ppdb/student/status-rejected/{student}',[PpdbController::class, 'statusRejectedUpdate'])->name('ppdb.student.rejected');
            Route::put('ppdb/student/status-accepted/{student}',[PpdbController::class, 'statusAcceptedUpdate'])->name('ppdb.student.accepted');
        });
    });
});
