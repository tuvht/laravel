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
    				->select('p.id AS category_id', 'p.name AS product_name', 'c.id AS category_id', 'c.name AS category_name', 'p.status', 'p.created_at')
    				->get();

    	return view('category.list', array('data' => $data));
    }
}
