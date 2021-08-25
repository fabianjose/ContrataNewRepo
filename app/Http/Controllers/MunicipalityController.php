<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Municipality;
use App\Department;

class MunicipalityController extends Controller
{

    public function getAll(){
		$municipalities = DB::table('municipalities')->where("trash",0)->orderBy('name', 'asc')->get();
		if (!$municipalities) return response()->json('Error en la base de datos',500);
		return response()->json($municipalities, 200);
	}

  public function getByDepartment($departmentName){
    $department = Department::where('name',$departmentName)->first();
    if (!$department) return response()->json('Departamento no encontrado',404);
    $municipalities = DB::table('municipalities')->where('department_id',$department->id)->where("trash",0)->orderBy('name', 'asc')->get();
    if (!$municipalities) return response()->json('Error en la base de datos',500);
    return response()->json($municipalities, 200);
  }

	public function newMunicipality(Request $request){
		$req=$request->all();
		$validator=Validator::make($req,[
			"department" => "required|exists:departments,name|string",
			"name" => "string|unique:municipalities|required|min:3|max:64",
		]);

		if($validator->fails()){
			return response()->json($validator->errors(),400);
		}

	    $department = Department::where('name',$req["department"])->first();

		$municipality=Municipality::create([
			"name"=>$req["name"],
			"department_id"=>$department->id,
		]);

		if(!$municipality){
			return response()->json('Error en la base de datos', 500);
		}

		return response()->json('Municipio creado satisfactoriamente', 201);

	}

	public function remove($id){
		$municipality = Municipality::find($id);
		if (!$municipality) return response()->json('Municipio no encontrado',404);
		$municipality->trash = 1;
		if (!$municipality->save()) return response()->json('Error en la base de datos',500);
		return response()->json('Municipio eliminado satisfactoriamente', 200);
	}

}
