<?php

namespace EventApp\Http\Controllers;


use EventApp\Domain\Models\Event;
use EventApp\Domain\Models\Talk;

class MainController extends Controller
{
    public function index()
    {
        $events = Event::take(6)->get();

        $talks = Talk::take(6)->get();

        return response()->json([
            'events' => $events,
            'talks' => $talks
        ]);
    }
}
