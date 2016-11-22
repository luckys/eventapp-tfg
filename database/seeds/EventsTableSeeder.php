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
        $user1 = factory(\EventApp\Domain\Models\User::class)->create(['email' => 'user1@demo.com']);
        $user2 = factory(\EventApp\Domain\Models\User::class)->create(['email' => 'user2@demo.com']);
        $events = factory(\EventApp\Domain\Models\Event::class, 3)->create(['author_id' => $user1->id]);
        factory(\EventApp\Domain\Models\Talk::class, 4)->create(['speaker_id' => $user1->id]);
        $talks = factory(\EventApp\Domain\Models\Talk::class, 2)->create(['speaker_id' => $user2->id]);

        DB::table('event_talk')->insert([
            'event_id' => $events->random()->id,
            'talk_id' => $talks->random()->id,
            'initial_date' => Carbon\Carbon::now(),
            'status' => array_rand(['Pendiente' => 1, 'Aprobado' => 2], 1),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        /*for ($i=0; $i < 4; $i++ )
            DB::table('event_talk')->insert([
                'event_id' => Event::all()->random()->id,
                'talk_id' => Talk::all()->random()->id,
                'initial_date' => Carbon\Carbon::now(),
                'status' => array_rand(['Pendiente' => 1, 'Aprobado' => 2], 1),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);*/
    }
}
