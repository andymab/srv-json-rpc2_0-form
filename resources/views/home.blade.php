@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group">
                        <a href="{{route('form.create')}}" class="list-group-item list-group-item-action">Создать новую форму</a>
                        <a href="{{route('form.index')}}" class="list-group-item list-group-item-action">Журнал Форм</a>
                        <a href="{{route('formdata.index')}}" class="list-group-item list-group-item-action">Журнал Заполненых Форм</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
