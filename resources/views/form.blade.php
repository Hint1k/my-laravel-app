@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb4">
            <label for="title">Title</label>
            <input text="text" name="title" id="title"
                   @class(['border-red-500'=>$errors->has('title')])
                   {{-- class="border @error('title') border-red-500 @enderror border"--}}
                   value="{{ $task->title ?? old('title') }}"/>
            @error('title')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"
            @class(['border-red-500'=>$errors->has('title')])>{{ $task->title ?? old('description') }}</textarea>
            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"
            @class(['border-red-500'=>$errors->has('title')])>{{ $task->title ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
