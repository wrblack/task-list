<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10),
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function() {
  return view('create');
})->name('tasks.create');

Route::post('/tasks/create', function(TaskRequest $request) {
  $task = Task::create($request->validated());

  return redirect()
    ->route('tasks.show', ['task' => $task])
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function(Task $task) {
    return view('edit', [
      'task' => $task,
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}/toggle-complete', function(Task $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
  $task->update($request->validated());

  return redirect()
    ->route('tasks.show', ['task' => $task])
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task) {
  $result = $task->delete();

  if (!$result) {
    return redirect()
      ->route('tasks.show', ['task' => $task])
      ->with('failure', 'There was an error in removing this Task.');
  }

  return redirect()
    ->route('tasks.index')
    ->with('success', 'Task removed successfully.');
})->name('tasks.destroy');

Route::get('/tasks/{task}', function(Task $task) {
    return view('show', [
      'task' => $task,
    ]);
})->name('tasks.show');
