@extends('layouts.app')

@section('title', 'The list of tasks!')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">
            Add new task
        </a>
    </nav>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class([
                        // 'font-bold',
                        'line-through font-bold' => $task->completed,
                    ])>
                    {{ $task->title }}
                </a>
            </div>
        @empty
            <p>There are <b>no</b> tasks!</p>
        @endforelse

        @if ($tasks->count())
            <br>
            {{ $tasks->links() }}
        @endif

    </div>
@endsection
