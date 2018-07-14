<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EditProfileRequest;
use App\Http\Controllers\Controller;
use App\UserModel;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile()
    {
    	$data = UserModel::find(Auth::user()->id);

    	return view('user.edit-profile', array('data' => $data));
    }

    public function updateProfile(EditProfileRequest $request)
    {
		$type               = 'success';
		$msg                = 'Your information has been updated';
		$userModel          = UserModel::find(Auth::user()->id);
		$userModel->name    = $request->input('name');
		$userModel->address = $request->input('address');
		$userModel->phone   = $request->input('phone');

    	if (!$userModel->save())
    	{
			$type = 'danger';
			$msg  = 'Something error can not update!';
    	}

    	return redirect('/edit-profile')
    			->with(
    				array(
						'flash_level'   => 'result_msg',
						'flash_type'    => $type,
						'flash_massage' => $msg
    					)
    				);
    }
}
