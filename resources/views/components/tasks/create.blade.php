<x-layout page="Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

        <section class="create-task">

            <h1>Criar Tarefa</h1>
            <form>

                <x-form.textInput
                    name="title"
                    label="Título da tatefa"
                    placeholder="Digite o título da tarefa"
                    required="required"/>

                <x-form.textInput
                    type="date"
                    name="due_date"
                    label="Data da realização"
                    required="required"/>


                <div class="input-area">
                    <label for="category">
                        Categoria
                    </label>
                    <select id="category" name="category" required>
                        <option selected disabled value="">Selecione uma categoria</option>
                        <option>Um valor qualquer</option>
                    </select>
                </div>

                <div class="input-area">
                    <label for="desc">
                        Descrição da tarefa
                    </label>
                    <textarea id="desc" placeholder="Digite uma descrição da tarefa"></textarea>
                </div>

                <div class="input-area">
                    <button type="submit" class="btn btn-primary">Enviar tarefa</button>
                </div>
            </form>
        </section>
</x-layout>
