<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('main');

Route::get('/tasks', function () {
    $tasks = Task::latest()->where('completed', true)->get();
    return view('index', ['tasks' => $tasks]); //shows 'index' page from resources/views
})->name('tasks.index');

//this route has to be ahead of the next one or "create" will be read as "{id}"
Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $taskId = Task::findOrFail($id);
    return view('show', ['task' => $taskId]);
})->name('tasks.show');

Route::get('/tasks/{id}/edit', function ($id) {
    $taskId = Task::findOrFail($id);
    return view('edit', ['task' => $taskId]);
})->name('tasks.edit');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task();
    $task->title=$data['title'];
    $task->description=$data['description'];
    $task->long_description=$data['long_description'];
    $task->save(); // create a new record in mysql database

    return redirect()->route('tasks.show',['id'=>$task->id])
        ->with('success','Task created successfully!'); // one time only message
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::findOrFail($id);
    $task->title=$data['title'];
    $task->description=$data['description'];
    $task->long_description=$data['long_description'];
    $task->save(); // create a new record in mysql database

    return redirect()->route('tasks.show',['id'=>$task->id])
        ->with('success','Task updated successfully!'); // one time only message
})->name('tasks.update');

Route::fallback(function () {
    return 'This is a fallback page';
});
