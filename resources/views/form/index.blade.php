@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 63px;">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}"><span>Главная</span></a></li>
                </ol>
            </div>
        </div>
    </div>
    <h1 class="fs-3 text-center">Журнал форм</h1><!-- Start: table -->
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">Создать новую
                            форму</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Наименование</th>
                                <th title="Просмотр формы"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye-fill">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                        </path>
                                    </svg></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elements as $item)
                                <tr>
                                    <td scope="row">{{ $item->updated_at }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><a name="" id="" class="btn btn-link" href="{{ route('form.show', $item->id) }}"
                                            role="button" title="Просмотр формы"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                class="bi bi-eye-fill">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                                                </path>
                                            </svg></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- End: table -->
@endsection
