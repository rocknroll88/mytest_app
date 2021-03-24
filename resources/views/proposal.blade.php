@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('home') }}">Домой</a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Заявка #{{ $proposal->id }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item"><b>Имя:</b> {{ $proposal->first_name }}</li>
                        <li class="list-group-item"><b>Фамилия:</b> {{ $proposal->last_name }}</li>
                        <li class="list-group-item"><b>Телефон:</b> {{ $proposal->phone }}</li>
                        <li class="list-group-item"><b>Email:</b> {{ $proposal->email }}</li>
                        <li class="list-group-item"><b>Сообщение:</b> {{ $proposal->textarea }}</li>
                        <li class="list-group-item"><b>Файл:</b> <a href="{{ $proposal->file }}">{{ $proposal->file }}</a></li>
                      </ul>

                      <div class="mt-3 d-flex justify-content-end">
                        <form action="{{ route('done.index', ['id' => $proposal->id])}}" method="get">
                        <button type="submit" class="btn btn-danger">Закрыть заявку</button>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
