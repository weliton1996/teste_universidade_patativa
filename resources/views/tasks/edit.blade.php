<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks - Editar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Editar tarefa') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Altera a tarefa selecionada') }}
                        </p>
                    </header>
                
                    <form method="post" action="{{ route('mytasks.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="task_id" value="{{ old('task_id', $tasksWithCategoryName->id) }}"> 
                
                        <div>
                            <x-input-label :value="__('Nome')"/>
                            <x-text-input  name="name" type="text" class="mt-1 block w-full" placeholder="digite o nome da tarefa" :value="old('name', $tasksWithCategoryName->name)"  />
                            <x-input-error :messages="$errors->first('name')" class="mt-2" />
                        </div>
    
                        <div>
                            <x-input-label :value="__('Detalhes')"/>
                            <x-text-input  name="detals" type="text" class="mt-1 block w-full" placeholder="O que é a task?" :value="old('detals', $tasksWithCategoryName->detals)"/>
                            <x-input-error :messages="$errors->first('detals')" class="mt-2" />
                        </div>
    
                        <div>
                            <x-input-label :value="__('Categoria')"/>
                            <x-text-input  name="category" type="text" class="mt-1 block w-full" placeholder="Ex.: Compras" :value="old('category', $tasksWithCategoryName->category_name)"/>
                            <x-input-error :messages="$errors->first('category')" class="mt-2" />
                        </div>
                
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                            <a href="{{ route('mytasks') }}">Voltar para lista</a>
                        </div>
                    </form>

                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
