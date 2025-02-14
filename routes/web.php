<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('main');

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);
    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

//this route has to be ahead of the next one or "create" will be read as "{id}"
Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete(); // the function is defined in Task.php
    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}) ->name('tasks.destroy');

Route::fallback(function () {
    return 'This is a fallback page';
});
