@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            ← Back to the list of tasks
        </a>
    </div>
    <h1 class="text-lg mb-4 font-bold">{{ $task->title }}</h1>
    <p class="text-slate-700 mb-4">{{ $task->description }}</p>
    @isset($task->long_description)
        <p class="text-slate-700 mb-4">{{ $task->long_description }}</p>
    @endisset
    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} •
        Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit
            task</a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
