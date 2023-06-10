<x-layout page="TodoApp">

    <x-slot:btn>
        <a href="{{route('tasks.create')}}" class="btn btn-primary">
            Criar tarefa
        </a>
        <a href="{{route('logout')}}" class="btn">
            Sair
        </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph-header">
            <h2>Progresso do dia</h2>

            <div class="line"></div>

            <div class="date">
                <a href="{{route('home', ['date'=> $dataInfo['date_prev_button']])}}">
                <img src="/assets/images/icon-prev.png" /></a>
                <!--<input type="date" />-->
                    {{$dataInfo['date_as_string']}}
                <a href="{{route('home', ['date'=> $dataInfo['date_next_button']])}}">
                    <img src="/assets/images/icon-next.png" /></a>
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

        @foreach ($tasks as $task)
        <x-task :data=$task />
        @endforeach

        <script>
            const taskUpdate = async (element) =>{
                let status = element.checked;
                let taskId = element.dataset.id;

                let url = '{{route('task.update')}}';

                let rawResult = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'accept': 'application/json'
                    },
                    body: JSON.stringify({status, taskId, _token: '{{csrf_token()}}'})
                });

                let result = await rawResult.json();
                if(result.success){
                    alert("Tarefa atualizada com sucesso!");
                }
                else{
                    element.checked = !status;
                }
            }

        </script>

</x-layout>
