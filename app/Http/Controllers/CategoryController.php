<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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

    public function index()
    {
    	$data = CategoryModel::all();

    	return view('category.list', array('data' => $data));
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $data = CategoryModel::find($id);

        return view('category.edit', array('data' => $data));
    }

    public function delete(Request $request)
    {
        $type = 'success';
        $msg  = 'Category ' . $id . ' has been deleted';
        $id   = $request->input('id');
        
        if (!CategoryModel::find($id)->delete())
        {
            $type = 'danger';
            $msg  = 'Category' . $id . ' can not be deleted';
        }

        return redirect('/categories')
                ->with(
                    array(
                        'flash_level'   => 'result_msg',
                        'flash_type'    => $type,
                        'flash_massage' => $msg
                        )
                    );
    }
}
