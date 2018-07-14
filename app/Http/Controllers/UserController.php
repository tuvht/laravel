<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
    	return view('user.edit-profile');
    }

    public function updateProfile(Request $request)
    {
    	$type = 'success';
    	$msg = 'Update Success';
    	$userModel = UserModel::find(Auth::user()->id);
    	$userModel->name = $request->input('name');

    	if (!$userModel->save())
    	{
    		$type = 'danger';
    		$msg = 'Update Failed';
    	}

    	return redirect('/edit-profile')
    			->with(
    				array(
    					'flash_level' => 'result_msg',
    					'flash_type' => $type,
    					'flash_massage' => $msg
    					)
    				);
    }
}
