<div class="item form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="col-form-label col-md-2" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <div class="col-md-10">
        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
            value="{{ old($field['name'], \setting($field['name'])) }}"
            class="form-control {{ array_get( $field, 'class') }}" id="{{ $field['name'] }}">

        @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
    </div>
</div>