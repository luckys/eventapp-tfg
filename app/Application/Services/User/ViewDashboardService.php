<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/7/16
 * Time: 3:22 PM
 */

namespace EventApp\Application\Services\User;

use EventApp\Traits\AppHelper;
use Illuminate\Support\Facades\DB;

class ViewDashboardService extends UserService
{
    use AppHelper;

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $talks = DB::table('talks')
                    ->select('talks.id', 'talks.title', 'event_talk.status', 'event_talk.initial_date', 'events.name', 'events.start_date', 'users.firstname', 'users.lastname')
                    ->join('event_talk', 'talks.id', '=', 'event_talk.talk_id')
                    ->join('events', 'events.id', '=', 'event_talk.event_id')
                    ->join('users', 'users.id', '=', 'talks.speaker_id')
                    ->where('events.author_id', '=', auth()->user()->id)
                    ->get();
        foreach ($talks as $talk){
            $talk->status = $this->decorateWithSpan($talk->status);
        }
        return $talks;
    }
}