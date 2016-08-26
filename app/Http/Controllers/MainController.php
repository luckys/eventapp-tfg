<?php

namespace EventApp\Http\Controllers;


class MainController extends Controller
{
    public function index()
    {
        return view('front.event.view-all');
    }
}
