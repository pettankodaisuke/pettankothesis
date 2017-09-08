<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Redirect;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $data['page'] = 'Home';
        return view('Home.Home', $data);
    }
    public function overall()
    {
        $data['page']  = 'overview';
        $data["_comp"] = DB::table("compdatas")->get();

        return view('Admin.overall', $data);
    }       
    public function getdetails()
    {
        $id      = Request::input("id");
        $request = Request::input("request");
        $data    = DB::table("compdatas")->where("id",$id)->first();
        return json_encode($data->$request);
    }
}
