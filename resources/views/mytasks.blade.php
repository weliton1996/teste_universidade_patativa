<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @section('content')
                        <h1>Lista de tasks</h1>
                        <ul>
                            @foreach ($tasks as $task)
                                <li>
                                    <span>{{ $task->nome }}</span> - 
                                    <x-dropdown align="center" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">                                      
                                                <a href="{{ route('tasks.show', $task->id) }}"> <span>{{ str_limit($task->detals, 10) }}...</span></a>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <p><strong>Detalhes:</strong> {{ $tasks->detals }}</p>
                                            <a href="{{ route('tasks.index') }}">X</a>
                                        </x-slot>
                                    </x-dropdown>
                                    {{-- <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Excluir</button>
                                    </form> --}}
                                </li>
                            @endforeach
                        </ul>
                    @endsection

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
