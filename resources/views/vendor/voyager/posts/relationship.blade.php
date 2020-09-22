@php
    $relationshipField = $row->field; 
@endphp

<select
    class="form-control select2" name="{{ $options->column }}"
    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
>
    @php
        $model = app($options->model);
        $query = \Auth::user()->sites;
    @endphp

    @foreach($query as $relationshipData)
        <option value="{{ $relationshipData->{$options->key} }}" 
            @if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}) 
            selected="selected" @endif>
            {{ $relationshipData->{$options->label} }}
        </option>
    @endforeach
</select>
    

