<div class="item form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label class="col-form-label col-md-2" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <div class="col-md-10">
        @if( setting($field['name']) )
        Mevcut Logo:<br>
        <img src="{{ asset('storage/'.setting($field['name'])) }}" style="height:80px;">
        <br>
        <br>
        Yeni Logo Yükle:<br>
        @endif
        <input type="file"
               name="{{ $field['name'] }}"
               class="form-control {{ array_get( $field, 'class') }}"
               id="{{ $field['name'] }}">
    
        @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
    </div>
</div>