@extends('layouts.app',[
    'title'=> 'Форма'
    ])
@section('content')
<style>
.card-body p{
    display: flex;
    justify-content: space-between;
}

</style>
<section class="text-center bg-light mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card m-auto" style="width: 30rem;display:flex; flex-direction:column; align-items:center;">
                    <div class="card-body" style=" align-items:left">
                        <h5 class="card-title font-monospace">Форма № {{ $form->id}} </h5>
                        <p class="text-start  font-monospace m-0"> <span class="text-muted">Обновлена:</span>{{ $form->updated_at}} </p>
                        <p class="text-start  font-monospace m-0"> <span class="text-muted">Создана:</span>{{ $form->created_at}} </p>
                        <p class="text-start  font-monospace m-0"> <span class="text-muted">Наименование:</span>{{ $form->name}} </p>
                        <p class="text-start  font-monospace m-0"> <span class="text-muted">Описание:</span>{{ $form->description}} </p>
                        <p class="text-start  font-monospace m-0"> <span class="text-muted">"Элементы формы":</span></p>
                        <hr>
                        <?php $model = json_decode($form->model) ?>
                        <div class="mb-5">

@foreach ($model->elements as $key=> $item)
<p class="text-start  font-monospace m-0"> <span class="text-muted">{{ $key + 1 }}. label:</span>{{ $item->title}}  </p>
<p class="text-start  font-monospace m-0"> <span class="text-muted"> Тип: {{ $item->type}}</span></p>
<p class="text-start  font-monospace m-0"> <span class="text-muted"> Обязателен: {{ $item->isRequired}}</span></p>
<hr>
@endforeach

</div>

                        <a href="{{ route('form.index')}}" class="btn btn-outline-success btn-sm">Вернуться</a>
                        <a href="{{ route('form.edit',[$form->id])}}" class="btn btn-outline-primary btn-sm">Редактировать</a>
                        <form action="{{ route('form.destroy',[$form->id])}}" method="POST" enctype="multipart/form-data" style="display:inline-block" onclick="if( confirm('точно хотите удалить карточку')){return true} else {return false}">
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