<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Пример сотрудник",
                "description" => "Информация о сотруднике",
                'created_at' => now(),
                'updated_at' => now(),
                "model" => json_encode(
                    [
                        "title" => "Пример сотрудник",
                        "description" => "Информация о сотруднике",
                        "elements" =>  [
                            [
                                "type" => "text",
                                "name" => "question1",
                                "title" => "Имя",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question2",
                                "title" => "Фамилия",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question3",
                                "title" => "Отчество",
                                "isRequired" => '',
                            ],
                            [
                                "type" => "textarea",
                                "name" => "question4",
                                "title" => "Примечание",
                                "isRequired" => '',
                            ],

                        ],
                    ],

                )
            ],
            [
                "name" => "Пример животное",
                "description" => "Информация о животном",
                'created_at' => now(),
                'updated_at' => now(),
                "model" => json_encode(
                    [
                        "title" => "Пример животное",
                        "description" => "Информация о животном",
                        "elements" => [
                            [
                                "type" => "text",
                                "name" => "question1",
                                "title" => "Наименование",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question2",
                                "title" => "Порода",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question3",
                                "title" => "Места обитания",
                                "isRequired" => true,
                            ],
                        ],
                    ],
                ),
            ],
            [
                "name" => "Пример организация",
                "description" => "Информация о организации",
                'created_at' => now(),
                'updated_at' => now(),
                "model" => json_encode(
                    [
                        "title" => "Пример организация",
                        "description" => "Информация о организации",
                        "elements" =>
                        [
                            [
                                "type" => "text",
                                "name" => "question1",
                                "title" => "Наименование",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question2",
                                "title" => "ИНН",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question3",
                                "title" => "КПП",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question4",
                                "title" => "Расчетный счет",
                                "isRequired" => true,
                            ],
                            [
                                "type" => "text",
                                "name" => "question5",
                                "title" => "Aдрес",
                                "isRequired" => true,
                            ],
                        ],
                    ],
                ),
            ],
        ];

        DB::table('forms')->insert($data);
    }
}
