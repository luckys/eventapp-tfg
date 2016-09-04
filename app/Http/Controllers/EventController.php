<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\Event\CreateEventService;
use EventApp\Application\Services\Event\ListEventService;
use EventApp\Application\Services\Event\ShowEventService;
use EventApp\Application\Services\Event\UpdateEventService;
use EventApp\Http\Requests\EventRequest;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
