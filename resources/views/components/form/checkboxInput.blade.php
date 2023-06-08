<div class="checkbox-input">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
        type="checkbox"
        id="{{$name}}"
        name="{{$name}}"
        value="1"
        {{$checked ? 'checked' : ''}} />
</div>
