@php
    $name = $attributes->get('name');
    $type = $attributes->get("type");
    $class = $errors->has($name) ?
    "form-control form-control-sm is-invalid" :
    "form-control form-control-sm ";
@endphp

<input type="{{$type}}" {{$attributes->merge(['class' => $class])}}  value="{{old($name) ? old($name) : ''}}">
