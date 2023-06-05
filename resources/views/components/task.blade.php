<div class="tasks">
    <div class="task-title">
        <input type="checkbox"
            @if($data && $data['done'])
                checked
            @endif
        />

        <p>{{$data['title'] ?? ''}}</p>
    </div>
    <div class="task-priority">
        <div class="sphere"></div>
        <p>{{$data['category'] ?? ''}}</p>
    </div>
    <div class="task-action">
        <a
        href="edit?id={{$data['id']}}"
        ><img src="/assets/images/icon-edit.png" /></a>
        <a href="delete?id={{$data['id']}}"
        ><img src="/assets/images/icon-delete.png" /></a>
    </div>
</div>


