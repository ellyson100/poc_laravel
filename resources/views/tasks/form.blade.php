<form method="POST" action="{{ $action }}" class="space-y-6">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $task->title ?? '')" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('description', $task->description ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div>
        <x-input-label for="status" :value="__('Status')" />
        <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="pending" {{ (old('status', $task->status ?? '') == 'pending') ? 'selected' : '' }}>{{ __('Pending') }}</option>
            <option value="in_progress" {{ (old('status', $task->status ?? '') == 'in_progress') ? 'selected' : '' }}>{{ __('In Progress') }}</option>
            <option value="completed" {{ (old('status', $task->status ?? '') == 'completed') ? 'selected' : '' }}>{{ __('Completed') }}</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('status')" />
    </div>

    <div>
        <x-input-label for="priority" :value="__('Priority')" />
        <select id="priority" name="priority" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="low" {{ (old('priority', $task->priority ?? '') == 'low') ? 'selected' : '' }}>{{ __('Low') }}</option>
            <option value="medium" {{ (old('priority', $task->priority ?? '') == 'medium') ? 'selected' : '' }}>{{ __('Medium') }}</option>
            <option value="high" {{ (old('priority', $task->priority ?? '') == 'high') ? 'selected' : '' }}>{{ __('High') }}</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('priority')" />
    </div>

    <div>
        <x-input-label for="due_date" :value="__('Due Date')" />
        <x-text-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" :value="old('due_date', isset($task) ? $task->due_date?->format('Y-m-d') : '')" />
        <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ $submitText }}</x-primary-button>
        <a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Cancel') }}</a>
    </div>
</form> 