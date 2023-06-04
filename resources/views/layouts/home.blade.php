<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoApp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>
<div class="container">
    <div class="sidebar">
        <div class="logo">GT</div>
    </div>
    <div class="content">
        <nav>
            <a href="#" class="btn btn-primary">
                Criar tarefa
            </a>
        </nav>
        <main>
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

                <div class="tasks">
                    <div class="task-title">
                        <input type="checkbox" />
                        <p>Tiltulo da tarefa</p>
                    </div>
                    <div class="task-priority">
                        <div class="sphere"></div>
                        <p>Tiltulo da tarefa</p>
                    </div>
                    <div class="task-action">
                        <a><img src="/assets/images/icon-edit.png" /></a>
                        <a><img src="/assets/images/icon-delete.png" /></a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
</body>
</html>
