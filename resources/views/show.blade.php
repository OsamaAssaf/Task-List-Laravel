@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div>
        <a href="{{ route('tasks.index') }}"><b>Back to the list of tasks</b></a>
        <br>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"><b>Edit task</b></a>
        <br>
        <br>
    </div>
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    @isset($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endisset
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
