<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormDataTableSeeder extends Seeder
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
                "form_uid" => 1,
                'created_at' => now(),
                'updated_at' => now(),
                "data" => json_encode(
                    [
                        "question1" => "Сергей",
                        "question2" => "Михалков",
                        "question3" => "Александрович",
                        "question4" => "1982г. рождения",
                    ],
                ),
            ],
            [
                "form_uid" => 1,
                'created_at' => now(),
                'updated_at' => now(),
                "data" => json_encode(
                    [
                        "question1" => "Александр",
                        "question2" => "Анатольевич",
                        "question3" => "Мехлис",
                        "question4" => "Архитектор",
                    ],
                ),
            ],
            [
                "form_uid" => 2,
                'created_at' => now(),
                'updated_at' => now(),
                "data" => json_encode(
                    [
                        "question1" => "Ящерица",
                        "question2" => "Ящерообразные",
                        "question3" => "Повсеместно",
                    ],
                ),
            ],
            [
                "form_uid" => 2,
                'created_at' => now(),
                'updated_at' => now(),
                "data" => json_encode(
                    [
                        "question1" => "Собака",
                        "question2" => "Дог",
                        "question3" => "Повсеместно",
                    ],
                ),
            ],
            [
                "form_uid" => 3,
                'created_at' => now(),
                'updated_at' => now(),
                "data" => json_encode(
                    [
                        "question1" => "ООО Рога и копыта",
                        "question2" => "777000044445",
                        "question3" => "777000000001",
                        "question4" => "245698788777",
                        "question5" => "г.Москва Самойловский бульвар 14",
                    ],
                ),
            ],
        ];

        DB::table('form_data')->insert($data);
    }
}
