@extends('layouts.app', [
    'title' => 'Форма',
])
@section('content')
    <style>
        .card-body p {
            display: flex;
            justify-content: space-between;
        }

    </style>
    <section class="text-center bg-light mt-4" >
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card m-auto"
                        style="width: 30rem;display:flex; flex-direction:column; align-items:center;">
                        <div class="card-body" style=" align-items:left">
                            <h5 class="card-title font-monospace">Данные № {{ $formdata->id }} </h5>
                            <p class="text-start  font-monospace m-0"> <span
                                    class="text-muted">Обновлены</span>{{ $formdata->updated_at }} </p>
                            <p class="text-start  font-monospace m-0"> <span
                                    class="text-muted">Создана:</span>{{ $formdata->created_at }} </p>
                            <p class="text-start  font-monospace m-0"> <span class="text-muted">Наименование
                                    формы:</span>{{ $form_model->title }} </p>
                            <p class="text-start  font-monospace m-0"> <span class="text-muted">Описание
                                    формы:</span>{{ $form_model->description }} </p>
                            <p class="text-start  font-monospace m-0"> <span class="text-muted">"Данные":</span></p>
                            <div class="mb-5">
                                <?php $key = 0; ?>
                                @foreach ($formdata_data as $item)
                                    <p class="text-start  font-monospace m-0"> <span
                                            class="text-muted">{{ $form_model->elements[$key]->title }}
                                            :</span>{{ $item }} </p>
                                            <?php $key++ ;?>
                                @endforeach

                            </div>

                            <a href="{{ route('formdata.index') }}" class="btn btn-outline-success btn-sm">Вернуться</a>
                            <form action="{{ route('formdata.destroy', [$formdata->id]) }}" method="POST"
                                enctype="multipart/form-data" style="display:inline-block"
                                onclick="if( confirm('точно хотите удалить карточку')){return true} else {return false}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger btn-sm" value="Удалить">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
