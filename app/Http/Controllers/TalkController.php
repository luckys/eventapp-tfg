<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\Talk\CreateTalkService;
use EventApp\Application\Services\Talk\DeleteStateTalkService;
use EventApp\Application\Services\Talk\DeleteTalkService;
use EventApp\Application\Services\Talk\GeneratePdfTalkService;
use EventApp\Application\Services\Talk\ListTalkService;
use EventApp\Application\Services\Talk\PaymentTalkService;
use EventApp\Application\Services\Talk\ShowTalkService;
use EventApp\Application\Services\Talk\StateTalkService;
use EventApp\Application\Services\Talk\UpdateTalkService;
use EventApp\Events\TalkWasPurchased;
use EventApp\Http\Requests\PaymentRequest;
use EventApp\Http\Requests\TalkRequest;
use Illuminate\Http\Request;


class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ListTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ListTalkService $service)
    {
        return $service->getAllTalks($request);
    }

    public function formSubscribe($id, ListTalkService $service, ShowTalkService $serviceShow)
    {
        $talk = $serviceShow->execute(null, $id);

        $events = $service->getEventsSubscribible($id);

        $talk_event = $service->getEventsSigned($id);

        return view('admin.talks.subscribe-talk', compact('talk', 'events', 'talk_event'));
    }

    public function list(ListTalkService $service)
    {
        $talks = $service->execute();

        return view('admin.talks.list', compact('talks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.talks.create');
    }

    public function allTalks()
    {
        return view('front.talk.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TalkRequest $request
     * @param CreateTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function store(TalkRequest $request, CreateTalkService $service)
    {
        $service->execute($request);

        return redirect()->back()->with('message', 'Charla añadida correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param ShowTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function show($id, ShowTalkService $service)
    {
        $talk = $service->execute(null, $id);

        return view('front.talk.show', compact('talk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param ShowTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ShowTalkService $service)
    {
        $talk = $service->execute(null, $id);

        return view('admin.talks.edit', compact('talk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TalkRequest $request
     * @param  int $id
     * @param UpdateTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function update(TalkRequest $request, $id, UpdateTalkService $service)
    {
        $service->execute($request, $id);

        return redirect('admin/talks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param DeleteTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteTalkService $service)
    {
        $service->execute(null, $id);

        $message = "La charla ha sido eliminado correctamente";

        return response()->json(['message' => $message]);
    }

    public function formBuy($id)
    {
        return view('front.talk.form-buy', compact('id'));
    }

    public function paymentTalk(PaymentRequest $request, PaymentTalkService $service)
    {
        $flag = $service->execute($request, $request->id);

        if($flag)
            return redirect('talks/ticket/'.$request->id.'/purchased');

        return response('Compra hecha');
    }

    public function buyTalk($id, PaymentTalkService $service)
    {
        $flag = $service->execute(null, $id);

        if($flag)
            return redirect('talks/ticket/'.$id.'/purchased');

        return response('Compra hecha');
    }

    public function getTicket($id, GeneratePdfTalkService $service)
    {
        $pdf = $service->execute(null, $id);

        $nameFile = str_random(10).'.pdf';

        $patchURL = 'uploads/talks/tickets/'.$nameFile;

        $patchFile = public_path($patchURL);


        $user = [
            'email' => session('email'),
            'name' => session('name'),
            'url' => $patchURL
        ];

        event(new TalkWasPurchased($user));

        return $pdf->save($patchFile)->stream();

    }

    public function changeState(Request $request, StateTalkService $service)
    {
        $service->execute($request, null);

        return redirect()->back()->with('message', 'Estado actualizado correctamente');
    }
}
