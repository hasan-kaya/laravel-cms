@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <div class="module-title">
                    Form Başvuruları
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Form Türü</th>
                        <th>Tarih</th>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>
                        <th>E-Posta</th>
                        <th>Mesaj</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->type->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->data['name'] }}</td>
                        <td>{{ $item->data['phone'] }}</td>
                        <td>{{ isset($item->data['email']) ? $item->data['email'] : '-' }}</td>
                        <td>{{ isset($item->data['message']) ? $item->data['message'] : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection