<?php

namespace EventApp\Http\Controllers;

use EventApp\Application\Services\User\SignUpService;
use EventApp\Application\Services\User\UpdatePasswordService;
use EventApp\Application\Services\User\UpdateProfileService;
use EventApp\Application\Services\User\ViewDashboardService;
use EventApp\Http\Requests\ProfileRequest;
use EventApp\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{

    protected $redirectPath = '/admin/dashboard';

    /**
     * Display a listing of the resource.
     *
     * @param ViewDashboardService $service
     * @return \Illuminate\Http\Response
     */
    public function index(ViewDashboardService $service)
    {
        $talks = $service->execute();

        return view('admin.users.dashboard', compact('talks'));
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

        return redirect('admin/auth/user/profile')->with('message', 'Perfil actualizado correctamente');
    }

    public function getChangePassword()
    {
        return view('admin.users.edit-password');
    }

    public function updatePassword(UpdatePasswordRequest $request, UpdatePasswordService $service)
    {
        $service->execute($request, null);

        return redirect('admin/auth/user/profile')->with('message', 'Contraseña actualizada correctamente');
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
