<div class="tasks {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
    <div class="task-title">
        <input type="checkbox" onchange="taskUpdate(this)" data-id="{{$data['id']}}"
            @if($data && $data['is_done'])
                checked
            @endif
        />

        <p>{{$data['title'] ?? ''}}</p>
    </div>
    <div class="task-priority">
        <div class="sphere" style="background-color: {{$data['category']['color']}};"></div>
        <p>{{$data['category']->title ?? ''}}</p>
    </div>
    <div class="task-action">
        <a
        href="{{route('task.edit', ['id' => $data['id']])}}"
        ><img src="/assets/images/icon-edit.png" /></a>
        <a href="{{route('task.delete', ['id' => $data['id']])}}"
        ><img src="/assets/images/icon-delete.png" /></a>
    </div>
</div>


