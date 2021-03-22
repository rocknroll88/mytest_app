@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Заявка #{{ $proposal->id }}</div>

                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item"><b>Имя:</b> {{ $proposal->first_name }}</li>
                        <li class="list-group-item"><b>Фамилия:</b> {{ $proposal->last_name }}</li>
                        <li class="list-group-item"><b>Телефон:</b> {{ $proposal->phone }}</li>
                        <li class="list-group-item"><b>Email:</b> {{ $proposal->email }}</li>
                        <li class="list-group-item"><b>Сообщение:</b> {{ $proposal->textarea }}</li>
                        <li class="list-group-item"><b>Файл:</b> <a href="{{ $proposal->file }}">{{ $proposal->file }}</a></li>
                      </ul>

                      <div class="mt-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger">Закрыть заявку</button>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
