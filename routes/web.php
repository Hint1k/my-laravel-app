<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('main');

Route::get('/tasks', function () {
/*
console commands: php artisan tinker and \App\Models\Task::all(); and
\App\Models\Task::select('id','title')->where('completed',true)->get();
*/
    $tasks = Task::latest()->where('completed', true)->get();
    return view('index', ['tasks' => $tasks]); //shows 'index' page from resources/views
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
//    $task = collect($tasks)->firstWhere('id', $id);
//    if (!$task) {
//        abort(Response::HTTP_NOT_FOUND);
//    }
    $taskId = Task::findOrFail($id);
    return view('show', ['task' => $taskId]);
})->name('tasks.show');

Route::fallback(function () {
    return 'This is a fallback page';
});
