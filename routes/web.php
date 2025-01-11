<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('index');

Route::get('/tasks', function () {
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {

    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => '',
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

// Route::get('/hello', function () {
//     return '<a>Hello</a>';
// })->name('hello');

// Route::get('/hallo', function () {
//     // return redirect('/hello');
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return  "Hello {$name}!";
// });

Route::fallback(function () {
    return "No Route Found!";
});
