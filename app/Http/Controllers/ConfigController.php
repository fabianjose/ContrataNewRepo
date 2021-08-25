<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Config;

class ConfigController extends Controller
{
    public function edit(Request $request){

        $data=$request->all();

        $validator=Validator::make($data,[
            "configs" => "required|json",
            "configs.*" => "required|json",
            "configs.*.id"=> "required|exits:configs,id",
        ]);

        $configs= json_decode($data["configs"]);

        foreach ($configs as $config) {
            $value=$config->value;
            $config=Config::find($config->id);

            $config->value=$value;
            $config->save();
        }

        return response()->json(200);

    }

    public function getAll(){
        return Config::all();
    }

}
