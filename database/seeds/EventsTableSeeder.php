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
        factory(\EventApp\Domain\Models\User::class)->create();
        factory(\EventApp\Domain\Models\Event::class, 5)->create();
        factory(\EventApp\Domain\Models\Talk::class, 5)->create();

        for ($i=0; $i < 5; $i++ )
            DB::table('event_talk')->insert([
                'event_id' => Event::all()->random()->id,
                'talk_id' => Talk::all()->random()->id,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
    }
}
