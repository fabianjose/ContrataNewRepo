<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;
use App\Fields;

class ServiceController extends Controller{

  public function newService(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['required', 'string', 'min:6', 'max:128'],
      'fields' => ['json', 'nullable'],
      "fields.*"=> "json",
      "fields.*.name"=> "string|max:32|min:3",
      "fields.*.type"=> "in:numeric,string",
      "fields.*.unit"=> "string|max:16|min:1|nullable",
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $name = Service::where('name',$data['name'])->where('trash',0)->first();
    if ($name) return response()->json(['errorMessage' =>'Nombre de servicio ya en uso'], 400);

    $fields = $request->input("fields")?json_decode($data["fields"]):null;

    unset($data["fields"]);

    $service = Service::create($data);

    if($fields){
      foreach ($fields as $key=> $field) {
        $field=json_decode($field);
        $field->field_id=null;
        Fields::storeData($service->id,$field);
      }
    }

    if (!$service) return response()->json('Error en la base de datos', 500);
    return response()->json('Servicio creado satisfactoriamente', 201);
  }

  public function editService($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['string', 'min:6', 'max:128', 'required'],
      'fields' => ['json', 'nullable'],
      "fields.*.name"=> "string|max:32|min:3",
      "fields.*.type"=> "in:numeric,string",
      "fields.*.unit"=> "string|max:16|min:1|nullable",
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $name = Service::where('name',$data['name'])->where('trash',0)->where('id','<>',$id)->first();
    if ($name) return response()->json(['errorMessage' =>'Nombre de servicio ya en uso'], 400);
    $service = Service::find($id);
    if (!$service) return response()->json('Servicio no encontrado',404);

    $keysAllow = [
      'name',
    ];

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $service->{$key} = $data[$key];
      }
    }

    $fields = $request->input("fields")?json_decode($data["fields"]):null;

    if($fields){
      foreach ($fields as $key => $field) {
        $field=json_decode($field);
        $field->field_id=null;
        $fields[$key]=json_encode($field);
        
      }
    }

    $existentFields= DB::table("fields")->where("service_id", $service->id)->get();

    if($existentFields){
      foreach ($existentFields as $key => $exField) {
        if($fields){
          if(count($fields)>$key){
            $field=json_decode($fields[$key]);
            $field->field_id= $exField->id;
            $fields[$key] = json_encode($field);
          }
          else {
            $field=Fields::find($exField->id);
            $field->delete();
          }
        }
      }
    }

    if($fields){
      foreach ($fields as $field) {
        Fields::storeData($service->id,json_decode($field));
      }
    }
    
    if (!$service->save()){

      return response()->json('Error en la base de datos', 500);
    }

    return response()->json('Servicio editado satisfactoriamente', 200);
  }

  public function getFields($id){
    return DB::table('fields')->where("service_id", $id)->where("trash",0)->get();
  }

  public function getAll(){
		$services = DB::table('services')->where('trash',0)->get();
    if (!$services) return response()->json('Error en la base de datos',500);
    foreach ($services as $service) {
      $service->fields=DB::table('fields')
      ->where("fields.service_id", $service->id)
      ->where("fields.trash", 0)
      ->limit(2)
      ->get();
    }
		return response()->json($services, 200);
	}

	public function getService($id){
		$service = Service::find($id);
		if (!$service) return response()->json('Servicio no encontrado',404);
		$service = DB::table('services')->where('id',$id)->where('trash',0)->first();
		if (!$service) return response()->json('Servicio no encontrado',404);
		return response()->json($service, 200);
	}

	public function deleteService($id){
		$service = Service::find($id);
		if (!$service) return response()->json('Servicio no encontrado',404);
		if (!$service->delete()) return response()->json('Error en la base de datos',500);
		return response()->json('Servicio eliminado satisfactoriamente', 200);
	}

}
