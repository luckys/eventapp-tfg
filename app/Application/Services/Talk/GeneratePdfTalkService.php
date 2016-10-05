<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/5/16
 * Time: 11:54 AM
 */

namespace EventApp\Application\Services\Talk;


class GeneratePdfTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $product = $this->talk->find($id);
        $view =  view('admin.tickets.talk-ticket', compact('product'));
        $pdf = \App::make('dompdf.wrapper');
        return $pdf->loadHTML($view);
    }
}