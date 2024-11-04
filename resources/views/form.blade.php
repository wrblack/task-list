@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
<form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" class="w-full max-w-lg" method="POST">
    @csrf
    @method('POST')
    @isset($task)
        @method('PUT')
    @endisset
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Title
            </label>
            <input type="text"
                id="title"
                name="title"
                placeholder="Your title here"
                value="{{ $task->title ?? old('title') }}"
                class="appearence-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3"
                />
            @error('title')
                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Description
            </label>
            <input type="text"
                id="description"
                name="description"
                placeholder="A short description here"
                value="{{ $task->description ?? old('description') }}"
                class="appearence-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3">
            @error('description')
                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Long Description
            </label>
            <input type="text"
                id="long_description"
                name="long_description"
                placeholder="Type a long description here"
                value="{{ $task->long_description ?? old('long_description') }}"
                class="appearence-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3">
            @error('long_description')
                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
            @enderror
        </div>
    </div>
    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
        type="submit">
        {{ isset($task) ? 'Edit' : 'Create' }} Task
    </button>
</form>
@endsection