<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $task->title }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('tasks.edit', $task) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Edit Task') }}
                </a>
                <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Back to Tasks') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ __('Description') }}</h3>
                            <p class="mt-2 text-gray-600">{{ $task->description ?: __('No description provided.') }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Status') }}</h3>
                                <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($task->status === 'completed') bg-green-100 text-green-800
                                    @elseif($task->status === 'in_progress') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Priority') }}</h3>
                                <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($task->priority === 'high') bg-red-100 text-red-800
                                    @elseif($task->priority === 'medium') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Due Date') }}</h3>
                                <p class="mt-2 text-gray-600">{{ $task->due_date ? $task->due_date->format('Y-m-d') : __('No due date set.') }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Created At') }}</h3>
                                <p class="mt-2 text-gray-600">{{ $task->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('Last Updated') }}</h3>
                                <p class="mt-2 text-gray-600">{{ $task->updated_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 