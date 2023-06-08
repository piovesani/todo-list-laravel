<div class="input-area">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
        type="{{empty($type) ? 'text' : $type}}"
        id="{{$name}}"
        name="{{$name}}"
        value="{{$value ?? ''}}"
        placeholder="{{$placeholder ?? ''}}"
    {{empty($required) ? '' : 'required'}} />
</div>
