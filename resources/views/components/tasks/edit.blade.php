<x-layout page="Editar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Ver tarefas
        </a>
    </x-slot:btn>
    <section class="create-task">

        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('tasks.editAction')}}">

            @csrf

            <input type="hidden" name="id" value="{{$task->id}}" />

            <x-form.checkboxInput
                name="is_done"
                label="Tarefa realizada?"
                checked="{{$task->is_done}}" />

            <x-form.textInput
                name="title"
                label="Título da tatefa"
                placeholder="Digite o título da tarefa"
                value="{{$task->title}}"
                required="required"/>

            <x-form.textInput
                type="datetime-local"
                name="due_date"
                value="{{$task->due_date}}"
                label="Data da realização"
                required="required"/>


            <x-form.selectInput
                name="category_id"
                label="Categoria"
                required="required">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == $task->category_id)
                            selected
                        @endif
                        >
                        {{$category->title}}</option>
                @endforeach
            </x-form.selectInput>


            <x-form.textAreaInput
                name="description"
                label="Descrição da tarefa"
                value="{{$task->description}}"
                placeholder="Digite uma descrição da tarefa"
                required="required">
                <option>Um valor qualquer</option>
            </x-form.textAreaInput>

            <div class="input-area">
                <x-form.formButton resetTxt="Limpar campos" submitTxt="Salvar tarefa" />

            </div>
        </form>
    </section>
</x-layout>


