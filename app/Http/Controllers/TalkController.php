<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\Talk\CreateTalkService;
use EventApp\Application\Services\Talk\ListTalkService;
use EventApp\Application\Services\Talk\ShowTalkService;
use EventApp\Application\Services\Talk\UpdateTalkService;
use EventApp\Http\Requests\TalkRequest;
use Illuminate\Http\Request;

use EventApp\Http\Requests;
use EventApp\Http\Controllers\Controller;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ListTalkService $service
     * @return \Illuminate\Http\Response
     */
    public function index(ListTalkService $service)
    {
        return $service->getAllTalks();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
