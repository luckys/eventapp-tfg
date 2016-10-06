<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\User\SignUpService;
use EventApp\Application\Services\User\UpdateProfileService;
use EventApp\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{

    protected $redirectPath = '/admin/dashboard';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SignUpService $service
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request, SignUpService $service)
    {
        if ($service->execute($request))
            return redirect('admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.users.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @param UpdateProfileService $service
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, UpdateProfileService $service)
    {
        $service->execute($request, null);

        return redirect()->back()->with('message', 'Perfil actualizado correctamente');
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
