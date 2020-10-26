@extends('admin.layouts.master')
@section('content')
<style>
    textarea {
        font-size: 12px !important;
        min-width: 210px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <div class="module-title">
                    Dil Parametleri
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-sm btn-success btn-block" onclick="update_all()">
                    Tümünü Kaydet
                </button>
            </div>
            <div class="col-md-2">
                <a class="btn btn-sm btn-primary btn-block" href="{{ route("admin.language-values.create") }}">
                    Yeni Parametre Ekle
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('admin.language-values.update-all') }}" method="POST" id="language-form">
                @csrf
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Grup</th>
                            <th>Parametre</th>
                            @foreach($languages as $language)
                            <th>{{$language}}</th>
                            @endforeach
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($values as $value)
                        <tr>
                            <td>{{ $value->group }}</td>
                            <td>{{ $value->key }}</td>
                            @foreach($languages as $locale => $language)
                            <td>
                                <textarea rows="6" name="values[{{$value->id}}][{{$locale}}]"
                                    class="form-control">{{ isset($value->text[$locale]) ? $value->text[$locale] : "" }}</textarea>
                            </td>
                            @endforeach
                            <td>
                                <a class="btn btn-sm btn-info align-top"
                                    href="{{ route('admin.language-values.edit', $value->id) }}">
                                    Düzenle
                                </a>
                                <a class="btn btn-sm btn-danger align-top"
                                    href="{{ route('admin.language-values.edit', $value->id) }}">
                                    Sil
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-sm btn-success btn-block" onclick="update_all()">
                    Tümünü Kaydet
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function update_all() {
        $('#language-form').submit();
    }
</script>
@endsection