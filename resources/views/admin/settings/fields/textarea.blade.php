<div class="item form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="col-form-label col-md-2" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <div class="col-md-10">
        <textarea name="{{ $field['name'] }}" class="form-control">{{ old($field['name'], \setting($field['name'])) }}</textarea>
        @if ($errors->has($field['name'])) 
        <small class="help-block">{{ $errors->first($field['name']) }}</small>
        @endif
    </div>
</div>