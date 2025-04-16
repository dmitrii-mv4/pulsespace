<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\TaskManager\TaskManagerController;
use App\Http\Controllers\TaskManager\SectionsController;


Route::get('/', 'App\Http\Controllers\TaskManager\TaskManagerController@index')->name('taskmanager');

Route::prefix('sections')->group(function () {
    Route::get('/', 'App\Http\Controllers\TaskManager\SectionsController@index')->name('taskmanager.tasks.sections');
    
    Route::post('', 'App\Http\Controllers\TaskManager\SectionsController@create')->name('taskmanager.tasks.sections.create');
});

Route::prefix('tasks')->group(function () {
    Route::get('/', 'App\Http\Controllers\TaskManager\TasksController@index')->name('taskmanager.tasks');
    
    Route::post('', 'App\Http\Controllers\TaskManager\TasksController@create')->name('taskmanager.tasks.create');

    // Route::get('/{task}/update', 'App\Http\Controllers\Admin\Articles\CategoriesController@edit')->name('admin.articles.categories.edit');
    Route::patch('/{task}/update_completed', 'App\Http\Controllers\TaskManager\TasksController@update_completed')->name('taskmanager.tasks.update_completed');
});