<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/30/16
 * Time: 10:40 AM
 */

namespace EventApp\Application\Services\Talk;


use Carbon\Carbon;
use EventApp\Domain\Models\Event;
use Illuminate\Support\Facades\DB;

class ListTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->talk->allWhere(['speaker_id' => auth()->user()->id]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getAllTalks($request = null)
    {
        try {
            $talks = [];
            $datas =  $this->talk
                           ->orderBy('created_at', 'desc')
                           ->with(['speaker'])
                           ->findWhere([['total_tickets', '>', 0]]);

            if(!is_null($request->limit))
                $datas =  $this->talk
                    ->orderBy('created_at', 'desc')
                    ->with(['speaker'])
                    ->findWhere([['total_tickets', '>', 0]])->take($request->limit);

            foreach ($datas as $talk) {
                $result = [
                    'id' => $talk->id,
                    'title' => $talk->title,
                    'start_date' => $talk->start_date,
                    'address' => $talk->address,
                    'price' => $talk->price,
                    'image' => $talk->image,
                    'speaker' => $talk->speaker->fullname,
                ];
                array_push($talks, $result);
            }
            return $talks;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getEventsSubscribible($id)
    {
        try {
            //$talk = $this->talk->find($id);

            $events = DB::table('events')
                        ->where('start_date', '>=', Carbon::now())
                        ->leftJoin('event_talk', 'events.id', '=', 'event_talk.event_id')
                        ->whereNull('event_talk.talk_id') // , '=', $id)
                        ->get();

            return $events;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getEventsSigned($id)
    {
        try {
            //$talk = $this->talk->find($id);

            $events = Event::whereHas('talks', function ($query) use ($id) {
                $query->where('talk_id', $id);
            })
                ->whereDate('start_date', '>=', Carbon::now())
                //->whereDate('end_date', '>=', $talk->start_date)
                ->get();

            return $events;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}