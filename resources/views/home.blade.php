@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Новые заявки</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($proposals as $proposal)
                        @if ($proposal->is_done != 1)
                    <div class="list-group mt-2">
                        <a href="{{ route('show.index', ['id' => $proposal->id]) }}" class="list-group-item list-group-item-action alert alert-primary">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $proposal->subject }}</h5>
                            <small class="text-muted">{{ $proposal->created_at }}</small>
                          </div>
                          {{-- <p class="mb-1">Имя: {{ $proposal->first_name }}</p> --}}
                          <small class="text-muted">Email: {{ $proposal->email }}</small>
                        </a>
                      </div>
                      @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Закрытые заявки</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($proposals as $proposal)
                        @if ($proposal->is_done == 1)
                    <div class="list-group mt-2">
                        <a href="{{ route('show.index', ['id' => $proposal->id]) }}" class="list-group-item list-group-item-action alert alert-primary">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Заявка {{ $proposal->id }}</h5>
                            <small class="text-muted">{{ $proposal->created_at }}</small>
                          </div>
                          <p class="mb-1">Имя: {{ $proposal->first_name }}</p>
                          <small class="text-muted">Email: {{ $proposal->email }}</small>
                        </a>
                      </div>
                      @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
