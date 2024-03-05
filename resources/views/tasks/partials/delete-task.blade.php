<div>
    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Excluir') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('mytasks.delete') }}" class="p-6">
            @csrf
            @method('delete')
            <input type="hidden" name="task_id" value="{{ encrypt($task->id) }}">

            <div class="text-left">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza de que deseja excluir sua tarefa?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ao excluir voçê perderar acesso a essa tarefa na sua lista de tarefas') }}
                </p>
            </div>



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Excluir') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
