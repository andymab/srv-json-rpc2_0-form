

## О srv-json-rpc2_0-form
- Сервер отправляет и принимает данные в формате json rpc 2.0 от стороннего клиента
Сервер json RPC 2.0 (Сервис):
 - Имеет редактор форм – страницу редактора форм на котором можно задать типы поля, название и описание поля для формы, а также задать название самой формы. 
 - После сохранения форма имеет свой уникальный form_uid присвоенный редактором при сохранении, и дату создания формы.
 - Также есть отдельная страница на которой отображаются данные переданные в форму от клиента (client-json-rpc2_0-form) другого сайта через api.

## Стек:
  - php ^7.4
  - MariaDb ^10
  - composer ^2
  - nodejs npm

## Реализация сервера json RPC 2.0 представляет из себя сборку:
  - [Laravel ^8.6 ](https://laravel.com/docs/9.x/installation#:~:text=composer%20create%2Dproject%20laravel/laravel%20example%2Dapp)
  - добавлена библиотека laravel/ui
  - добавлена библиотека bootstrap ^5.0
  - реализация сервера json rpc 2.0 из пакета https://github.com/sajya/server.git документация на пакет https://sajya.github.io/docs/

## Структура
  - Модель User для авторизаций возможно ролей (UserController + migration из коробки) 
  
  - Модель Form 

        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name',255); //наименование  формы
            $table->text('description'); //описание  формы
            $table->json('model'); // json модель формы
            $table->softDeletes(); // пометка на удаление
            $table->timestamps(); // создание обновление
        });

  - Controller FormController --resource контроллер (создание,обработка, сохранение, удаление )
  - Модель FormData 

        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_uid'); // идентификатор модели формы
            $table->json('data'); // Загружаемые данные из вне
            $table->softDeletes(); // пометка на удаление
            $table->timestamps(); // создание обновление
            $table->foreign('form_uid')->references('id')->on('form');
        });

  - Сontroller FormDataController (просмотр журнала заполненых форм в разрезе названий)
  - Procedure FormProcedure Отвечающая за прием передачу форм и данных от сторонннего клиента

## Пути развития
- выполнить авторизацию
- проверка параметров запроса на наличие и правильность заполнение полей конкретной формы.
- задействование библиотеки https://surveyjs.io/, которая позволяет формировать и отбражать формы любой сложности, а также анкеты