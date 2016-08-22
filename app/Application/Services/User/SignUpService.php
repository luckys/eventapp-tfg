<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/20/16
 * Time: 4:01 PM
 */

namespace EventApp\Application\Services\User;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;

class SignUpService extends UserService
{

    use AuthenticatesAndRegistersUsers;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
        ]);
    }

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $this->user->create($request->all());
            auth()->login($this->user->last());
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}