<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tdia;
use App\Models\User;

class diasTrabajosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trabajo_id = 1;
        $dias = tdia::all();
        foreach($dias as $dia) {

                $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' => null] ]);
                $trabajo_id = $trabajo_id +1;
                $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_Id' => null] ]);
                $trabajo_id = $trabajo_id +1;

                $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>null] ]);
                $trabajo_id = $trabajo_id +1;







        }

    }
}
/* if($dia->id == 1) {
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' => null] ]);
    $trabajo_id = $trabajo_id +1;
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_Id' =>null] ]);
    $trabajo_id = $trabajo_id +1;

    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;
} else {
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_Id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;

    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;

} */
/* if($dia->id == 1) {
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' => null] ]);
    $trabajo_id = $trabajo_id +1;
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_Id' =>null] ]);
    $trabajo_id = $trabajo_id +1;

    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;
} else {
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;
    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_Id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;

    $dia->trabajos()->syncWithoutDetaching([$trabajo_id =>['user_id' =>user::all()->random()->id] ]);
    $trabajo_id = $trabajo_id +1;

} */
