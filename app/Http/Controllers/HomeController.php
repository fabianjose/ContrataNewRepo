<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function landing()
    {
        $configItems=Config::all();
        $configs =  DB::table('configs')->get();
        $clientes = DB::table('companies')->count();
       $configs[2]->value = "".( intval($configs[2]->value) + intval($clientes));
       // print_r($configs);
      //  return;
        return view('landing')->with(["configs"=>$configs]);
    }

}
