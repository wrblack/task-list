@extends('layouts.app')

@section('title', 'Task > ' . $task->title)

@section('content')
<div class="max-w-lg rounded overflow-hidden shadow-lg">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">
        {{ $task->title }}
      </div>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        <p>
          @if($task->completed)
            ✅ Completed!
          @else
            ❌ Working
          @endif
        </p>
      </span>
      <p class="text-gray-700 text-base mt-2">
        @if ($task->long_description)
            <p>{{ $task->long_description }}</p>
        @else
            <p>{{ $task->description }}</p>
        @endif
      </p>
    </div>
    <div class="px-10 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        <a href="{{ route('tasks.edit', $task->id)}}">🖊️ Edit</a>
      </span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        <form action="{{ route('tasks.toggle', ['task' => $task]) }}" method="POST">
          @csrf
          @method('PUT')
            <button>✔️ Mark {{ $task->completed ? 'Unfinished' : 'Complete' }}</button>
        </form>
      </span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
          @csrf
          @method('DELETE')
            <button>❌ Delete</button>
        </form>
      </span>
    </div>
</div>
@endsection