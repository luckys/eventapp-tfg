<?php

namespace EventApp\Http\Controllers;


use EventApp\Domain\Models\Event;
use EventApp\Domain\Models\Talk;

class MainController extends Controller
{
    public function index()
    {
        $events = Event::take(3)->get();

        $talks = Talk::take(3)->get();

        return view('front.main', compact('events', 'talks'));
    }
}
