@extends('layouts.app')

@section('title', 'The list of tasks!')

@section('content')
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <p>There are <b>no</b> tasks!</p>
        @endforelse

    </div>
@endsection
