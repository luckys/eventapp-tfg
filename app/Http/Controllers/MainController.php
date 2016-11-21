<?php

namespace EventApp\Http\Controllers;

use EventApp\Domain\Models\Event;
use EventApp\Domain\Models\Talk;
use EventApp\Domain\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $talks = Talk::all()->count();
        $events = Event::all()->count();

        return view('front.main', compact('users', 'talks', 'events'));
    }

    public function all()
    {
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();

        $talks = Talk::orderBy('created_at', 'desc')->take(3)->get();

        return response()->json([
            'events' => $events,
            'talks' => $talks
        ]);
    }
}
