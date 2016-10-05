<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/4/16
 * Time: 10:35 PM
 */

namespace EventApp\Application\Services\Event;

class GeneratePdfEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $product = $this->event->find($id);
        $view =  view('admin.tickets.event-ticket', compact('product'));
        $pdf = \App::make('dompdf.wrapper');
        return $pdf->loadHTML($view);
    }
}