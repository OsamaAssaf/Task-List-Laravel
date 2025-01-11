@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    @isset($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endisset
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>
@endsection
