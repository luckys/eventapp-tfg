<?php

use EventApp\Domain\Models\Event;
use EventApp\Domain\Models\Talk;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\EventApp\Domain\Models\User::class, 2)->create();
        factory(\EventApp\Domain\Models\Event::class, 4)->create();
        factory(\EventApp\Domain\Models\Talk::class, 6)->create();

        for ($i=0; $i < 4; $i++ )
            DB::table('event_talk')->insert([
                'event_id' => Event::all()->random()->id,
                'talk_id' => Talk::all()->random()->id,
                'initial_date' => Carbon\Carbon::now(),
                'status' => array_rand(['Pendiente' => 1, 'Aprobado' => 2], 1),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
    }
}
