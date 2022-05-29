@extends('layouts.app')

@section('content')
<!-- Start: 1 Row 1 Column -->
<div class="container" style="padding-top: 40px;">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><span>Главная</span></a></li>
                <li class="breadcrumb-item"><a href="#"><span>Журнал форм</span></a></li>
            </ol>
        </div>
    </div>
</div>
<h1 class="fs-3 text-center">Создание простых форм</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <form name="create_form">
                <label class="form-label">Введите название формы</label>
                <input class="form-control" name="title" type="text">
                <label class="form-label">Введите описание формы</label>
                <textarea class="form-control mb-3" name="description"></textarea>
                <a class="btn btn-outline-success mb-3" href="#" onclick="newtitle(); return false;">Установить на форму</a>
                <!-- Start: input txt -->
                <div class="mb-4"><label class="form-label">Добавьте элементы формы</label>
                    <div><label class="form-label">Элемент input text</label>
                        <div id="inputtext" class="root"><label class="form-label">Заголовок элемента</label><input class="form-control" name="el_input" type="text">
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck1" name="text_required"><label class="form-check-label" for="formCheck-1">Обязателен к заполнению</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck2" name="text_required"><label class="form-check-label" for="formCheck-2">Не обязателен к заполнению</label></div><a class="btn btn-outline-success" href="#" onclick="addinputText(this);return false;">Добавить элемент</a>
                        </div>
                        <div></div>
                    </div>
                </div><!-- End: input txt -->
                <!-- Start: input textarea -->
                <div><label class="form-label">Элемент textarea</label>
                    <div><label class="form-label">Заголовок элемента</label><input class="form-control" name="el_textarea" type="text">
                        <div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck3" name="inputarea"><label class="form-check-label" for="formCheck3">Обязателен к заполнению</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck4" name="inputarea"><label class="form-check-label" for="formCheck4">Не обязателен к заполнению</label></div><a class="btn btn-outline-success" href="#" onclick="addTextarea(this);return false;">Добавить элемент</a>
                        </div>
                    </div>
                </div><!-- End: input textarea -->
            </form>
        </div>
        <div class="col">
            <form name="constructor" class="constructor" action="{{ route('form.update',[$form->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <?php $model = json_decode($form->model);
                $elements_count = 1; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="header">
                            <h4 class="card-title">{{$model->title}}</h4>
                            <h6 class="text-muted card-subtitle mb-2 description">{{ $model->description}}</h6>
                        </div>
                        <div class="mb-4 elements-constructor">
                        </div>
                        <input type="hidden" name="json_">
                        <!-- End: form-elements -->
                        <button class="btn btn-primary" type="submit">Сохранить форму</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var model = <?= json_encode($model) ?>;
</script>

<script id="header" type="text/template">
    <div class="header">
    <h4 class="card-title">{title}</h4>
    <h6 class="text-muted card-subtitle mb-2 description">{description}</h6>
    </div>
</script>

<style>
    .box-element-model {
        position: relative;
    }

    .btn-elements {
        position: absolute;
        top: 0;
        right: 0;
    }
</style>
<script>
    var formconstructor;
    var formcreate;
    var cons;
    var count_model = 0;

    // var model = {
    //     "title": "mymy",
    //     "description": "mymy и грабли",
    //     "elements": [{
    //         "type": "text",
    //         "name": "question1",
    //         "title": "Хочу спросить",
    //         "isRequired": true
    //     }, ]
    // };



    document.addEventListener("DOMContentLoaded", function(event) {
        formconstructor = document.forms.namedItem('constructor');
        formcreate = document.forms.create_form;
        cons = document.querySelector('.constructor');
        if (model) {
            init_constructor();
        }
    });

    function init_constructor() {
        var div = document.createElement('DIV');
        div.classList.add('point_header');
        var header = document.querySelector('#header').cloneNode(true).innerText;
        div.innerHTML = header;
        div.querySelector('h4').innerText = model.title;
        div.querySelector('h6').innerText = model.description;
        cons.querySelector('.header').innerHTML = div.innerHTML;
        for (i = 0; i < model.elements.length; i++) {
            switch ( model.elements[i].type) {
                case 'text':
                    createElementInput(model.elements[i]);
                    break;
                case 'textarea':
                    createElementTextArea(model.elements[i]);
                    break;
                default:
                    break;
            }


        }
        store();

    }

function createElementInput(item){
       
        var div = document.createElement('DIV');
        div.id = 'id' + count_model;
        div.classList = "box-element-model";
        var label = document.createElement('LABEL');
        label.classList.add('form-label', 'w-100');
        label.innerHTML = '<span class="label_title">' + item.title +'</span>';
        var input = document.createElement('INPUT');
        input.classList.add('form-control', 'mb-2');
        input.name = "input" + count_model;
        input.type = "text";
        input.value = item.title;
        if (item.isRequired) {
            input.setAttribute('required', 'true');
        }
        label.appendChild(input);

        var div_box = document.createElement('DIV');
        div_box.classList.add('btn-elements');  

        var buttonsave = document.createElement('BUTTON');
        buttonsave.classList.add('btn', 'btn-primary', 'btn-sm');
        buttonsave.innerText = "Сохранить элемент";
        buttonsave.id = 
        buttonsave.addEventListener('click', function(e) {
            e.preventDefault();
         var box = this.closest('.box-element-model');
            var id = box.id.replace('id','');
            box.querySelector('.label_title').innerText = formconstructor.elements['input'+id].value;
            model.elements[id].title = input.value;
        });

        var button = document.createElement('BUTTON');
        button.classList.add('btn', 'btn-danger', 'btn-sm');
        button.innerText = "Удалить элемент";
        button.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#' + div.id).remove();
        });
        div_box.append(buttonsave);
        div_box.append(button);
        div.appendChild(label);
        div.appendChild(div_box);
        document.querySelector('.elements-constructor').appendChild(div);
        count_model += 1;
}

function createElementTextArea(item){
        count_model += 1;
        var div = document.createElement('DIV');
        div.id = 'id' + count_model;
        div.classList = "box-element-model";
        var label = document.createElement('LABEL');
        label.classList.add('form-label', 'w-100');
        label.innerText = item.title;
        var input = document.createElement('TEXTAREA');
        input.classList.add('form-control', 'mb-2');
        input.name = "input" + count_model;
        input.type = "text";
        input.value = item.title;
        if (item.isRequired) {
            input.setAttribute('required', 'true');
        }
        label.appendChild(input);
        var button = document.createElement('BUTTON');
        button.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-elements');
        button.innerText = "Удалить элемент";
        button.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#' + div.id).remove();
        });

        div.appendChild(label);
        div.appendChild(button);
        document.querySelector('.elements-constructor').appendChild(div);
}


    function newtitle() {
        var div = document.createElement('DIV');
        div.classList.add('point_header');
        var header = document.querySelector('#header').cloneNode(true).innerText;
        div.innerHTML = header;
        div.querySelector('h4').innerText = formcreate.elements.title.value;
        div.querySelector('h6').innerText = formcreate.elements.description.value;
        cons.querySelector('.header').innerHTML = div.innerHTML;
        model.title = formcreate.elements.title.value;
        model.description = formcreate.elements.description.value;
        store();
    }

    function addinputText(e) {
        count_model += 1;
        var div = document.createElement('DIV');
        div.id = 'id' + count_model;
        div.classList = "box-element-model";
        var label = document.createElement('LABEL');
        label.classList.add('form-label', 'w-100');
        label.innerText = formcreate.elements.el_input.value;
        var input = document.createElement('INPUT');
        input.classList.add('form-control', 'mb-2');
        input.name = "input" + count_model;
        input.type = "text";
        if (formcreate.querySelector('#formCheck1').checked) {
            input.setAttribute('required', 'true');
        }

        label.appendChild(input);
        var button = document.createElement('BUTTON');
        button.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-elements');
        button.innerText = "Удалить элемент";
        button.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#' + div.id).remove();
        });
        div.appendChild(label);
        div.appendChild(button);
        document.querySelector('.elements-constructor').appendChild(div);
        store();
    }

    function addTextarea(e) {
        count_model += 1;
        var div = document.createElement('DIV');
        div.id = 'id' + count_model;
        div.classList = "box-element-model";
        var label = document.createElement('LABEL');
        label.classList.add('form-label', 'w-100');
        label.innerText = formcreate.elements.el_textarea.value;
        var input = document.createElement('TEXTAREA');
        input.classList.add('form-control', 'mb-2');
        input.name = "input" + count_model;
        input.type = "text";
        if (formcreate.querySelector('#formCheck3').checked) {
            input.setAttribute('required', 'true');
        }

        label.appendChild(input);
        var button = document.createElement('BUTTON');
        button.classList.add('btn', 'btn-danger', 'btn-sm', 'btn-elements');
        button.innerText = "Удалить элемент";
        button.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#' + div.id).remove();

        });

        div.appendChild(label);
        div.appendChild(button);
        document.querySelector('.elements-constructor').appendChild(div);
        store();
    }




    function store() {
        // formconstructor = document.forms.namedItem('constructor');
        model.title = formconstructor.querySelector('.card-title').innerText;
        model.description = formconstructor.querySelector('.description').innerText;
        model.elements = [];

        for (var i = 0; i < formconstructor.elements.length; i++) {
            if (formconstructor.elements[i].type !== "button" && formconstructor.elements[i].type !== "submit" && formconstructor.elements[i].type !== "hidden") {
                console.log(formconstructor.elements[i].type);
                switch (formconstructor.elements[i].type) {
                    case 'text':
                        var current_element = {
                            "type": formconstructor.elements[i].type,
                            "name": 'question' + i,
                            "isRequired": formconstructor.elements[i].getAttribute('required'),
                            "title": formconstructor.elements[i].closest('label').innerText,
                        };
                        break;
                    case 'textarea':
                        var current_element = {
                            "type": formconstructor.elements[i].type,
                            "name": 'question' + i,
                            "isRequired": formconstructor.elements[i].getAttribute('isRequired'),
                            "title": formconstructor.elements[i].closest('label').innerText,
                        };
                        break;

                    default:
                        break;
                }
                model.elements.push(current_element);

            }
            formconstructor.elements.json_.value = JSON.stringify(model);
        }
    }
</script>
@endsection