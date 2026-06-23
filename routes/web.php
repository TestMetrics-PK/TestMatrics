<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Practice\Practice as PracticeLivewire;
use App\Http\Livewire\Admin\Questions\Index as AdminQuestionsIndex;
use App\Http\Livewire\Admin\Questions\Form as AdminQuestionsForm;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Settings\Index as AdminSettingsIndex;
use App\Http\Livewire\Admin\Posts\Index as AdminPostsIndex;
use App\Http\Livewire\Admin\Posts\Form as AdminPostsForm;
use App\Http\Livewire\Admin\Courses\Index as AdminCoursesIndex;
use App\Http\Livewire\Admin\Courses\Form as AdminCoursesForm;
use App\Http\Livewire\Test\MockTest as MockTestLivewire;
use App\Http\Livewire\Results\Index as ResultsIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->get('/practice', PracticeLivewire::class)->name('practice');

Route::middleware('auth')->get('/admin/questions', AdminQuestionsIndex::class)->name('admin.questions.index');
Route::middleware('auth')->get('/admin/questions/create', AdminQuestionsForm::class)->name('admin.questions.create');
Route::middleware('auth')->get('/admin/questions/{id}/edit', AdminQuestionsForm::class)->name('admin.questions.edit');
Route::middleware(['auth','is_admin'])->get('/admin', AdminDashboard::class)->name('admin.dashboard');
Route::middleware(['auth','is_admin'])->get('/admin/settings', AdminSettingsIndex::class)->name('admin.settings');
Route::middleware(['auth','is_admin'])->get('/admin/posts', AdminPostsIndex::class)->name('admin.posts.index');
Route::middleware(['auth','is_admin'])->get('/admin/posts/create', AdminPostsForm::class)->name('admin.posts.create');
Route::middleware(['auth','is_admin'])->get('/admin/posts/{id}/edit', AdminPostsForm::class)->name('admin.posts.edit');
Route::middleware(['auth','is_admin'])->get('/admin/courses', AdminCoursesIndex::class)->name('admin.courses.index');
Route::middleware(['auth','is_admin'])->get('/admin/courses/create', AdminCoursesForm::class)->name('admin.courses.create');
Route::middleware(['auth','is_admin'])->get('/admin/courses/{id}/edit', AdminCoursesForm::class)->name('admin.courses.edit');
Route::middleware('auth')->get('/mock-test', MockTestLivewire::class)->name('mock.test');
Route::middleware('auth')->get('/results', ResultsIndex::class)->name('results.index');
