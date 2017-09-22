<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Redirect;
use DB;
use PDF;
use Session;
use View;
class FrontController extends Controller
{
    public function __construct()
    {
        $get_user = Session::get("user");
        if(!$get_user)
        {
            if(Request::segment(1) != "home")
            {
                return Redirect::to("/home")->send();
            }
        }
    }
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
    public function export()
    {
        $start = Carbon::parse(Request::input("start"))->format('Y-m-d 00:00:00');
        $end   = Carbon::parse(Request::input("end"))->format('Y-m-d 23:59:59');

        if(!$start)
        {
            dd("Please put a starting date");
        }

        if(!$end)
        {
           dd("Please put an ending date");
        }

        $data = [];
        $data["starts"] = Carbon::parse(Request::input("start"))->format('Y-m-d');
        $data["ends"]   = Carbon::parse(Request::input("end"))->format('Y-m-d');
        // $data["_comp"] = DB::table("compdatas")->where("created_at",">=",$start)->where("created_at","<=",$end)->get();
        $data["_comp"] = DB::table("compdatas")->whereBetween('created_at', [$start, $end])->get();
        // dd($data);
        $pdf = PDF::loadView('pdf.export', $data);
        return $pdf->download('export.pdf');
    }









    public function home()
    {
        $data['page'] = 'Home';
        $data["message"] = Session::get('message');

        return view('ver2.home', $data);
    }   

    public function home_login()
    {
        $check = DB::table("usernames")->where("gmail",Request::input("username"))->where("password",Request::input("password"))->first();
        if(!$check)
        {

            return Redirect::to("/home")->with("message","error")->send();
        }
        else
        {
            Session::put("user",$check);
            return Redirect::to("/dashboard")->send();
        }
    }

    public function dashboard()
    {
        $data['page'] = 'Dashboard';
        $data["user_info"] = Session::get("user");
        return view('ver2.dashboard.pages.dashboard', $data);
    }
    public function history()
    {
        $data['page'] = 'Entry Data History';
        $data["user_info"] = Session::get("user");
        $data["_comp"] = DB::table("compdatas")->get();
        return view('ver2.dashboard.pages.history', $data);
    }
    public function profile()
    {
        $data['page'] = 'Profile';
        $data["user_info"] = Session::get("user");
        return view('ver2.dashboard.pages.profile', $data);
    }    
    public function profile_submit()
    {
        $user_id            = Session::get("user")->id;
        $update["fname"]    = Request::input("fname");
        $update["mname"]    = Request::input("mname");
        $update["lname"]    = Request::input("lname");
        $update["contact"]  = Request::input("contact");
        $update["gmail"]    = Request::input("gmail");
        $update["password"] = Request::input("password");


        DB::table("usernames")->where("id",$user_id)->update($update);
        $check = DB::table("usernames")->where("id",$user_id)->first();
        Session::put("user",$check);
        return Redirect::to("/profile");
    }
    public function computerlist()
    {
        $data['page'] = 'Computer List';
        $data["user_info"] = Session::get("user");
        // $data["_comp"] = DB::table("compdatas")->get();
        $_comp = DB::table("pcnames")->get();
        $level = 1;
        $start = Carbon::parse(Carbon::now("Asia/Hong_Kong"))->format('Y-m-d 00:00:00');
        $end   = Carbon::parse(Carbon::now("Asia/Hong_Kong"))->format('Y-m-d 23:59:59');
        
        foreach($_comp as $key => $comp)
        {
            $temp_data = DB::table("compdatas")->whereBetween('created_at', [$start, $end])->take(2)->where("name",$comp->pcname)->get();
            // dd($temp_data);
            foreach($temp_data as $key2 => $temp)
            {
                $temp_data[$key2]->converted_date = Carbon::parse($temp->created_at)->format('H');
            }

            $_comp[$key]->relative = $temp_data;
        }

        $data["_comp"] = $_comp;
        return view('ver2.dashboard.pages.computer', $data);
    }
    public function eventlog()
    {
        $data['page'] = 'Event Log';
        $data["user_info"] = Session::get("user");
        $data["_comp"] = DB::table("eventlog")->get();
        return view('ver2.dashboard.pages.eventlog', $data);
    }
    public function report()
    {
        $data['page'] = 'Report';
        $data["user_info"] = Session::get("user");
        return view('ver2.dashboard.pages.report', $data);
    }
    public function report_view()
    {
        $data['page'] = 'Report';
        $data["user_info"] = Session::get("user");
        $start = Carbon::parse(Request::input("start"))->format('Y-m-d 00:00:00');
        $end   = Carbon::parse(Request::input("end"))->format('Y-m-d 23:59:59');

        if(!$start)
        {
            dd("Please put a starting date");
        }

        if(!$end)
        {
           dd("Please put an ending date");
        }

        $data = [];
        $data["starts"] = Carbon::parse(Request::input("start"))->format('Y-m-d');
        $data["ends"]   = Carbon::parse(Request::input("end"))->format('Y-m-d');
        // $data["_comp"] = DB::table("compdatas")->where("created_at",">=",$start)->where("created_at","<=",$end)->get();
        $data["_comp"] = DB::table("compdatas")->whereBetween('created_at', [$start, $end])->get();
        // $data["_evt"] = DB::table("eventlog")->whereBetween('created_at', [$start, $end])->get();
        // dd($data);
        // $pdf = PDF::loadView('pdf.export', $data);
        // return $pdf->download('export.pdf');
        return view('ver2.dashboard.pages.templatereport', $data);
    }
    public function report_view2()
    {
        $data['page'] = 'Report';
        $data["user_info"] = Session::get("user");
        $start = Carbon::parse(Request::input("start"))->format('Y-m-d 00:00:00');
        $end   = Carbon::parse(Request::input("end"))->format('Y-m-d 23:59:59');

        if(!$start)
        {
            dd("Please put a starting date");
        }

        if(!$end)
        {
           dd("Please put an ending date");
        }

        $data = [];
        $data["starts"] = Carbon::parse(Request::input("start"))->format('Y-m-d');
        $data["ends"]   = Carbon::parse(Request::input("end"))->format('Y-m-d');
        // $data["_comp"] = DB::table("compdatas")->where("created_at",">=",$start)->where("created_at","<=",$end)->get();
        $data["_evt"] = DB::table("eventlog")->whereBetween('created_at', [$start, $end])->get();
        // dd($data);
        // $pdf = PDF::loadView('pdf.export', $data);
        // return $pdf->download('export.pdf');
        return view('ver2.dashboard.pages.eventlogreport', $data);
    } 
    public function report_export()
    {
        $data['page'] = 'Report';
        $data["user_info"] = Session::get("user");
        $start = Carbon::parse(Request::input("start"))->format('Y-m-d 00:00:00');
        $end   = Carbon::parse(Request::input("end"))->format('Y-m-d 23:59:59');

        if(!$start)
        {
            dd("Please put a starting date");
        }

        if(!$end)
        {
           dd("Please put an ending date");
        }

        $data = [];
        $data["starts"] = Carbon::parse(Request::input("start"))->format('Y-m-d');
        $data["ends"]   = Carbon::parse(Request::input("end"))->format('Y-m-d');
        // $data["_comp"] = DB::table("compdatas")->where("created_at",">=",$start)->where("created_at","<=",$end)->get();
        $data["_comp"] = DB::table("compdatas")->whereBetween('created_at', [$start, $end])->get();
        $data["_evt"] = DB::table("eventlog")->whereBetween('created_at', [$start, $end])->get();
        // dd($data);
        $pdf = PDF::loadView('ver2.dashboard.pages.combine', $data);
        return $pdf->download('export.pdf');
    
    }
    public function logout()
    {
        Session::forget("user");
        return Redirect::to("/home")->send();
    }
}
