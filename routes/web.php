<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('index');

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    // $task = Task::findOrFail($id);
    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);
    // $data = $request->validated();

    // $task = Task::findOrFail($id);

    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task->update($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Updated Successfully!');;
})->name('tasks.update');

Route::get('/tasks/{task}', function (Task $task) {
    // $task = Task::findOrFail($id);
    // if (!$task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {

    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);
    // $data = $request->validated();

    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Created Successfully!');;
})->name('tasks.store');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task Deleted Successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()
        ->with('success', 'Task Updated Successfully!');
})->name('tasks.toggle-complete');

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
