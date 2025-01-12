@extends('layouts.app')

@section('title', 'The list of tasks!')

@section('content')
    <div>
        <a href="{{ route('tasks.create') }}"><b>Add new task</b></a>
        <br>
        <br>
    </div>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <p>There are <b>no</b> tasks!</p>
        @endforelse

    </div>
@endsection
