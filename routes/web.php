<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/survey/{id}', [App\Http\Controllers\EntriesController::class, 'create'])->name('entries.create');
Route::post('/', [App\Http\Controllers\EntriesController::class, 'store'])->name('entries.store');






/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('surveys')->name('surveys/')->group(static function() {
            Route::get('/',                                             'SurveysController@index')->name('index');
            Route::get('/create',                                       'SurveysController@create')->name('create');
            Route::post('/',                                            'SurveysController@store')->name('store');
            Route::get('/{survey}/edit',                                'SurveysController@edit')->name('edit');
            Route::get('/{survey}/show',                                'SurveysController@show')->name('show');
            Route::get('export/',                                'SurveysController@export')->name('export');
            Route::get('/{survey}/createQuestion',                      'SurveysController@createQuestion')->name('createQuestion');
            Route::post('/bulk-destroy',                                'SurveysController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{survey}',                                    'SurveysController@update')->name('update');
            Route::delete('/{survey}',                                  'SurveysController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('questions')->name('questions/')->group(static function() {
            Route::get('/',                                             'QuestionsController@index')->name('index');
            Route::get('/create',                                       'QuestionsController@create')->name('create');
            Route::post('/',                                            'QuestionsController@store')->name('store');
            Route::get('/{question}/edit',                              'QuestionsController@edit')->name('edit');
            Route::get('/{question}/editQuestion',                      'SurveysController@editQuestion')->name('editQuestion');
            Route::post('/bulk-destroy',                                'QuestionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{question}',                                  'QuestionsController@update')->name('update');
            Route::delete('/{question}',                                'QuestionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('answers')->name('answers/')->group(static function() {
            Route::get('/',                                             'AnswersController@index')->name('index');
            Route::get('/create',                                       'AnswersController@create')->name('create');
            Route::post('/',                                            'AnswersController@store')->name('store');
            Route::get('/{answer}/edit',                                'AnswersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AnswersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{answer}',                                    'AnswersController@update')->name('update');
            Route::delete('/{answer}',                                  'AnswersController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('types')->name('types/')->group(static function() {
            Route::get('/',                                             'TypesController@index')->name('index');
            Route::get('/create',                                       'TypesController@create')->name('create');
            Route::post('/',                                            'TypesController@store')->name('store');
            Route::get('/{type}/edit',                                  'TypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{type}',                                      'TypesController@update')->name('update');
            Route::delete('/{type}',                                    'TypesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('entries')->name('entries/')->group(static function() {
            Route::get('/',                                             'EntriesController@index')->name('index');
            Route::get('/create',                                       'EntriesController@create')->name('create');
            Route::post('/',                                            'EntriesController@store')->name('store');
            Route::get('/{entry}/edit',                                 'EntriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EntriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{entry}',                                     'EntriesController@update')->name('update');
            Route::delete('/{entry}',                                   'EntriesController@destroy')->name('destroy');
        });
    });
});
