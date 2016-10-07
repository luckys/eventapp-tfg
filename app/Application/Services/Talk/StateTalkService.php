<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/7/16
 * Time: 7:59 PM
 */

namespace EventApp\Application\Services\Talk;


use Illuminate\Support\Facades\DB;

class StateTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $state = DB::table('event_talk')
                    ->select('status')
                    ->where('event_id', '=', $request->event_id)
                    ->where('talk_id', '=', $request->talk_id)
                    ->get()[0];

        if($state->status == 'Pendiente'){
            $state->status = 'Aprobado';
        }else{
            $state->status = 'Pendiente';
        }

        return DB::table('event_talk')
            ->where('event_id', '=', $request->event_id)
            ->where('talk_id', '=', $request->talk_id)
            ->update(['status' => $state->status]);
    }
}