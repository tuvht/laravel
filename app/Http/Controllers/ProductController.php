<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
    	$data = DB::table('product AS p')
    				->leftJoin('category AS c', 'p.category', '=', 'c.id')
    				->select('p.id AS category_id', 'p.name AS product_name', 'c.id AS category_id', 'c.name AS category_name', 'p.status', 'p.description', 'p.created_at')
    				->get();

    	return view('product.list', array('data' => $data));
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $data = ProductModel::find($id);

        return view('product.edit', array('data' => $data));
    }

    public function delete(Request $request)
    {
        $type = 'success';
        $msg  = 'Product ' . $id . ' has been deleted';
        $id   = $request->input('id');
        
        if (!ProductModel::find($id)->delete())
        {
            $type = 'danger';
            $msg  = 'Product ' . $id . ' can not be deleted';
        }

        return redirect('/products')
                ->with(
                    array(
                        'flash_level'   => 'result_msg',
                        'flash_type'    => $type,
                        'flash_massage' => $msg
                        )
                    );
    }
}
