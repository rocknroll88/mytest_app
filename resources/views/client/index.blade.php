@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Мои заявки</div>
                <div class="card-body">
                    @foreach ($all_app as $app)
                        <div class="flex">
                           <a href="{{ route('card.index', ['id' => $app->id]) }}">{{ $app->subject }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Оставить новую заявку</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif

                    <form action="{{ route('create.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Введите Ваше имя">
                          </div>
                          <div class="form-group">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Введите Вашу фамилию">
                          </div>
                          <div class="form-group">
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Введите Ваш телефон">
                          </div>
                        <div class="form-group">
                          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите Вашу почту">
                          <small id="emailHelp" class="form-text text-muted">Мы не используем email  для спам рассылок</small>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" id="subjecte" placeholder="Введите тему сообщения">
                          </div>
                        <div class="form-group">
                            <textarea name="textarea" rows="5" class="form-control" id="textarea" rows="3"></textarea>
                          </div>
                        <div class="form-group">
                            <label for="file">Прикрепите файл</label>
                            <input name="file" type="file" class="form-control-file" id="file">
                          </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
