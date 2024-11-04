@extends('layouts.app')

@section('title', 'Task Lister')

@section('content')
<div class="w-full max-w-lg mx-auto">
    <ul class="bg-white p-4 rounded-lg shadow-md">
        @foreach ($tasks as $task)
            <li class="flex items-center justify-between mb-2 p-2 border-b border-gray-200 last:border-none">
                <a href="{{ route('tasks.show', $task->id) }}">
                    {{ $task->title }}
                    <span>
                        @if ($task->completed)
                            ✅
                        @else
                            ❌
                        @endif
                    </span>
                </a>
                <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="tet-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
<div class="w-full max-w-dmd mx-auto mt-4">
    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif
</div>
@endsection