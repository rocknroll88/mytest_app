@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Заявка #{{ $proposal->id }}</div>

                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item">{{ $proposal->first_name }}</li>
                        <li class="list-group-item">{{ $proposal->last_name }}</li>
                        <li class="list-group-item">{{ $proposal->phone }}</li>
                        <li class="list-group-item">{{ $proposal->email }}</li>
                        <li class="list-group-item">{{ $proposal->textarea }}</li>
                        <li class="list-group-item">{{ $proposal->file }}</li>
                      </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
