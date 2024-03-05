<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-[auto,1fr] items-center justify-center ">
                <div class="p-1 rounded-md m-1 mx-auto">                  
                    <x-new-button><a href="{{ route('mytasks.new') }}" class="text-gray-200 hover:text-gray-50">{{ __('Criar uma tarefa') }}</a></x-ne-button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-2">
                <div class="p-5 text-gray-900 dark:text-gray-100">
                    @if ($tasksWithCategoryName->isNotEmpty())
                       
                    <table class="w-full border-collapse ">
                        <thead>
                            <tr class="border-b border-slate-700 items-start">
                                <th class="text-left">Nome</th>
                                <th class="text-left">Detalhes</th>
                                <th class="text-left">Categoria</th>
                                <th></th>
                                <th></th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($tasksWithCategoryName as $task)
                                <tr>
                                    <td class="py-2  text-gray-500 dark:text-gray-400">{{ $task->name }}</td>
                                    <td class="py-2">
                                        <x-dropdown align="left" width="100%">
                                            <x-slot name="trigger">
                                                <button
                                                    class="items-center  py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                    <span>{{ Illuminate\Support\Str::limit($task->detals, 30) }}</span>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <div class="p-2">
                                                    <div>
                                                        <p>{{ $task->detals }}</p>
                                                    </div>
                                                    <div class="mt-3.5">
                                                        <a href="{{ route('mytasks') }}">X</a>
                                                    </div>
                                                </div>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                    <td class="py-2  text-gray-500 dark:text-gray-400">{{ $task->category_name }}</td>
                                    <td class="py-2 text-right">
                                        <span><a href="{{ route('mytasks.edit', ['id' => encrypt($task->id)]) }}">Editar</a></span>
                                    </td>
                                    <td class="py-2 text-right">
                                        <div >
                                            @include('tasks.partials.delete-task')
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            <span><p>Sem tarefas por aqui? Personalize sua lista adicionando novas tarefas com um simples clique no botão acima.</p></span>
                        </div>
                    @endif
                    
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
