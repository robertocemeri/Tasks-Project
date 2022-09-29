<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [ProjectController::class, 'index'])->name('projects.all');
Route::get('/project/tasks/{project}', [ProjectController::class, 'view_all_tasks'])->name('project.tasks');


Route::get('tasks', [TaskController::class, 'index'])->name('tasks.all');
Route::get('tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('tasks/store', [TaskController::class, 'store'])->name('task.store');
Route::get('tasks/update/{task}', [TaskController::class, 'update'])->name('task.edit');
Route::get('tasks/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');



Route::post('tasks/update-priority', [TaskController::class, 'updatePriority']);