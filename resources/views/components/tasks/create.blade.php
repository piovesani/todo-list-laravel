<x-layout page="Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

        <section class="create-task">

            <h1>Criar Tarefa</h1>
            <form method="POST" action="{{route('tasks.createAction')}}">

                @csrf

                <x-form.textInput
                    name="title"
                    label="Título da tatefa"
                    placeholder="Digite o título da tarefa"
                    required="required"/>

                <x-form.textInput
                    type="datetime-local"
                    name="due_date"
                    label="Data da realização"
                    required="required"/>


                <x-form.selectInput
                    name="category_id"
                    label="Categoria"
                    required="required">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </x-form.selectInput>


                <x-form.textAreaInput
                    name="description"
                    label="Descrição da tarefa"
                    placeholder="Digite uma descrição da tarefa"
                    required="required">
                    <option>Um valor qualquer</option>
                </x-form.textAreaInput>

                <div class="input-area">
                    <x-form.formButton resetTxt="Limpar campos" submitTxt="Criar tarefa" />

                </div>
            </form>
        </section>
</x-layout>
