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
            Tarefas <b>{{$dataInfo['taskIsDone']}}/{{$dataInfo['taskCount']}}</b>
        </div>

        <div class="graph-placeholder">
            <div class="graph-body">
                {{intval(($dataInfo['taskIsDone'] / $dataInfo['taskCount']) * 100)."%"}}
            </div>
        </div>
        <div class="graph-tasks-left">
            <img src="/assets/images/icon-info.png" />
            Restam {{$dataInfo['taskCount'] - $dataInfo['taskIsDone']}} tarefas a serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list-header">
            <select onchange="changeTaskStatusFilter(this)">
                <option value="all_tasks">Todas as tarefas</option>
                <option value="task_done">Tarefas Realizadas</option>
                <option value="task_pending">Tarefas Pendentes</option>
            </select>
        </div>

        @foreach ($tasks as $task)
        <x-task :data=$task />
        @endforeach

        <script>
            const changeTaskStatusFilter = (e) =>{

                    if(e.value ==='task_pending'){
                        showAllTasks();
                        document.querySelectorAll('.task_done').forEach(function(el){
                            el.style.display = 'none';
                        });
                    }
                    else if(e.value === 'task_done'){
                        showAllTasks();
                        document.querySelectorAll('.task_pending').forEach(function(el){
                            el.style.display = 'none';
                        });
                    }
                    else{
                        showAllTasks();
                    }
            }

            const showAllTasks = () => {
                document.querySelectorAll('.tasks').forEach(function(el){
                            el.style.display = 'flex';
                        });
            }
        </script>

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
