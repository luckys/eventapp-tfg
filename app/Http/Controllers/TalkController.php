<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\Talk\CreateTalkService;
use EventApp\Application\Services\Talk\ListTalkService;
use EventApp\Http\Requests\TalkRequest;
use Illuminate\Http\Request;

use EventApp\Http\Requests;
use EventApp\Http\Controllers\Controller;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
