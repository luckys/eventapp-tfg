<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\Event\CreateEventService;
use EventApp\Application\Services\Event\DeleteEventService;
use EventApp\Application\Services\Event\GeneratePdfEventService;
use EventApp\Application\Services\Event\ListEventService;
use EventApp\Application\Services\Event\PaymentEventService;
use EventApp\Application\Services\Event\ShowEventService;
use EventApp\Application\Services\Event\SubscribeEventService;
use EventApp\Application\Services\Event\UnsubscribeEventService;
use EventApp\Application\Services\Event\UpdateEventService;
use EventApp\Http\Requests\EventRequest;
use EventApp\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ListEventService $service
     * @return \Illuminate\Http\Response
     */
    public function index(ListEventService $service)
    {
        return $service->getAllEvents();
    }

    /**
     * Show all the events
     *
     * @return \Illuminate\Http\Response
     * @internal param ListEventService $service
     */
    public function allEvents()
    {
        return view('front.event.index');
    }

    public function list(ListEventService $service)
    {
        $events = $service->execute();

        return view('admin.events.list', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @param CreateEventService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EventRequest $request, CreateEventService $service)
    {
        $service->execute($request);

        return redirect()->back()->with('message', 'Evento añadido correctamente');
    }

    public function subscribeTalk(Request $request, $id, SubscribeEventService $service)
    {
        $service->execute($request, $id);

        return redirect()->back()->with('message', 'Charla subscrita al evento correctamente');
    }

    public function unsubscribeTalk(Request $request, $id, UnsubscribeEventService $service)
    {
        $service->execute($request, $id);

        return redirect()->back()->with('message', 'Charla eliminada del evento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param ShowEventService $service
     * @return \Illuminate\Http\Response
     */
    public function show($id, ShowEventService $service)
    {
        $event = $service->execute(null, $id);

        return view('front.event.show', compact('event'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param ShowEventService $service
     * @return \Illuminate\Http\Response
     */
    public function showEvent($id, ShowEventService $service)
    {
        $event = $service->execute(null, $id);

        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param ShowEventService $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ShowEventService $service)
    {
        $event = $service->execute(null, $id);

        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest|Request $request
     * @param  int $id
     * @param UpdateEventService $service
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id, UpdateEventService $service)
    {
        $service->execute($request, $id);

        return redirect('admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param DeleteEventService $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteEventService $service)
    {
        $service->execute(null, $id);

        $message = "El evento ha sido eliminado correctamente";

        return response()->json(['message' => $message]);
    }

    public function formBuy($id)
    {
        return view('front.event.form-buy', compact('id'));
    }

    public function paymentEvent(PaymentRequest $request, PaymentEventService $service)
    {
        $flag = $service->execute($request, $request->id);

        if($flag)
            return redirect('events/ticket/'.$request->id.'/purchased');

        return response('Compra hecha');
    }

    public function buyEvent($id, PaymentEventService $service)
    {
        $flag = $service->execute(null, $id);

        if($flag)
            return redirect('events/ticket/'.$id.'/purchased');

        return response('Compra hecha');
    }

    public function getTicket($id, GeneratePdfEventService $service)
    {
        $pdf = $service->execute(null, $id);

        return $pdf->stream(str_random(10).'.pdf');

    }
}
