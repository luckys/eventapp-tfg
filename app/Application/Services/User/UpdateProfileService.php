<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/6/16
 * Time: 5:02 PM
 */

namespace EventApp\Application\Services\User;

use Illuminate\Support\Facades\File;

class UpdateProfileService extends UserService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try{
            $path = public_path().'/uploads/profiles/';
            $fileName = $request->file('photo');
            $oldFileName = auth()->user()->photo;
            $datas = [
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'company' => $request->company,
                'biography' => $request->biography,
                'url_github' => $request->url_github,
                'url_twitter' => $request->url_twitter,
                'photo' => is_null($fileName) ? 'default.jpg' : $fileName->getClientOriginalName(),
            ];

            $this->user->update($datas, auth()->user()->id);

            if (($datas['photo'] !== 'default.jpg') && !is_null($request->file('photo'))){
                File::delete($path.$oldFileName);
                $request->file('photo')->move($path, $datas['photo']);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}