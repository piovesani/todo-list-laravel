<x-layout page="TodoApp">

    <x-slot:btn>
        <a href="#" class="btn btn-primary">
            Criar tarefa
        </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do dia</h2>

            <div class="line"></div>

            <div class="date">
                <a><img src="/assets/images/icon-prev.png" /></a>
                <input type="date" />
                <a><img src="/assets/images/icon-next.png" /></a>
            </div>
        </div>

        <div class="graph-header-subtitle">
            Tarefas <b>3/6</b>
        </div>

        <div class="graph-placeholder"></div>
        <div class="graph-tasks-left">
            <img src="/assets/images/icon-info.png" />
            Restam 3 tarefas a serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list-header">
            <select name="">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>

        @php
            $tasks = [
                [
                    'id' => 1,
                    'done' => true,
                    'title' => 'Minha primeira task',
                    'category' => 'Categoria 1'
                ],
                [
                    'id' => 2,
                    'done' => true,
                    'title' => 'Minha segunda task',
                    'category' => 'Categoria 2'
                ]
            ];
        @endphp
        <x-task :data=$tasks[0] />
        <x-task :data=$tasks[1] />
</x-layout>
