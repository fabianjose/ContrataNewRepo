<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Municipality;
use App\Department;
use App\Company;
use App\Service;
use Illuminate\Pagination\Paginator;
use App\FieldsValues;
use App\Offer;
use App\Highlight;

class OfferController extends Controller{

  public function newOffer(Request $request){
    $data = $request->all();
    
    $validation = Validator::make($data, [
      'company' => ['required', 'exists:companies,name', 'string'],
      'service' => ['required', 'exists:services,id'],
      'benefits' => ['required', 'string', 'min:16', 'max:124'],
      'fields_values' => ['json', 'nullable'],
      "fields_values.*"=> "json",
      "fields_values.*.value"=> "required|string|max:32|min:3",
      "fields_values.*.field_id"=> "required|exists:fields,id",
      'tariff' => ['required', 'integer', "min:0.1" , "max:9999999999"],
      'points' => ['integer','min:0,max:5'],
      'type' => ['nullable', 'in:private,company,isp,pyme'],
      'departments' => ['nullable', 'json'],
      'departments.*' => ["string|exists:departments,name"],
      'municipalities' => ['nullable', 'json'],
      'municipalities.*' => ["string|exists:municipalities,name"],
    ]);
    
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }



    $company = Company::where('name',$data['company'])->first();
    $data['company'] = $company->id;

    if (!$company) return response()->json('Empresa no encontrada',404);

    $service=Service::find($data["service"]);

    $fields= DB::table('fields')->where("service_id", $data["service"])->where("trash",0)->get();

    if(count($fields)&&empty(json_decode($data["fields_values"]))){
      return response()->json("Debe introducir los campos requeridos del servicio", 400);
    }

    $offer = Offer::create($data);
    if (!$offer) return response()->json('Error en la base de datos', 500);

    if(!empty(json_decode($data["fields_values"]))){
      foreach (json_decode($data["fields_values"]) as $field_value) {
        FieldsValues::storeValues($field_value, $offer->id);
      }
    }

    //FieldsValues::storeValues(json_decode($data["fields_values"]),$offer->id);

    return response()->json('Oferta creada satisfactoriamente', 201);
  }

  public function editOffer($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['exists:companies,name', 'string'],
      'service' => ['exists:services,id'],
      'benefits' => ['string', 'min:16', 'max:124'],
      'titulo1' => ['string', 'min:1', 'max:18'],
      'titulo2' => ['string', 'min:1', 'max:21'],
      'titulo3' => ['string', 'min:1', 'max:21'],
      'titulo4' => ['string', 'min:1', 'max:21'],
      'telefonia' => ['string', 'min:1', 'max:21'],
      'tecnologia' => ['string', 'min:1', 'max:21'],
      'canales' => ['string', 'min:1', 'max:21'],
      'tipo_plan_logos' => ['string', 'min:1', 'max:21'],
      'permanencia' => ['string', 'min:1', 'max:21'],
      'fijo' => ['string', 'min:1', 'max:21'],
      'movil' => ['string', 'min:1', 'max:21'],
      'deco' => ['string', 'min:1', 'max:21'],




      'fields_values' => ['json', 'nullable'],
      "fields_values.*"=> "json",
      "fields_values.*.value"=> "required|string|max:32|min:3",
      "fields_values.*.field_id"=> "required|exists:fields,id",
      'tariff' => ['required', 'integer', "min:0.1", "max:9999999999"],
      'points' => ['integer','min:0,max:5'],
      'type' => [ 'nullable','in:private,company,pyme,isp'],
      'departments' => ['nullable', 'json'],
      'departments.*' => ["string|exists:departments,name"],
      'municipalities' => ['nullable', 'json'],
      'municipalities.*' => ["string|exists:municipalities,name"],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $offer = Offer::find($id);
    if (!$offer) return response()->json('Oferta no encontrada',404);

    $company = Company::where('name',$data['company'])->first();
    if (!$company) return response()->json('Empresa no encontrada',404);

    $data['company'] = $company->id;

    $keysAllow = [
      'company',
      'service',
      'benefits',
      'fields_value',
      'tariff',
      'points',
      "type",
      "departments",
      "municipalities",
      "canales",
      "telefonia",
      "descuento",
      "tecnologia",
      "titulo1",
      "titulo2",
      "titulo3",
      "titulo4",
      'telefonia',
      'tecnologia',
      'canales',
      'tipo_plan_logos',
      'permanencia',
      'fijo',
      'movil',
      'deco'

    ];

    $service=Service::find($offer->service);

    $fields= DB::table('fields')->where("service_id", $service->id)->where("trash",0)->get();

    if(count($fields)&&empty(json_decode($request->input("fields_values")))){
      return response()->json("Debe introducir los campos requeridos del servicio", 400);
    }
    else if(!empty(json_decode($request->input("fields_values")))){
      foreach (json_decode($request->input("fields_values")) as $field_value) {
        FieldsValues::storeValues($field_value, $offer->id);
      }
    }

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $offer->{$key} = $data[$key];
      }else if($key=='type'||$key=='departments'||$key=='municipalities'){
        $offer->{$key} = null;
      }
    }

    if (!$offer->save()){
      return response()->json('Error en la base de datos', 500);
    }

    return response()->json('Oferta editada satisfactoriamente', 200);
  }

  public function getAll(Request $request){
    $offers = DB::table('offers')->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name'
    )
    ->get();

    $offers=Offer::joinFields($offers->toArray());

    if (!$offers) return response()->json(["errorMessage"=>'No se encontraron ofertas disponibles'],404);
		return response()->json($offers, 200);

	}

	public function getOffer(Request $request,$id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Oferta no encontrada',404);
		$offer = DB::table('offers')->where('offers.id',$id)->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name'
    )
    ->first();
    $offers=Offer::joinFields(array( $offer ));
    $offer=$offers[0];
    if(!$request->ajax()){
      if (!$offer) return response()->json('Oferta no encontrada',404);
      return view("pages.detailedOffer")->with(["offer"=>$offer]);
    }
    if (!$offer) return response()->json('Oferta no encontrada',404);
		return response()->json($offer, 200);
	}

  public function getByLocation(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['required', 'exists:companies,name'],
      'department' => ['required', 'exists:departments,name'],
      'municipality' => ['required', 'exists:municipalities,name'],
      "service" => "required|exists:services,id"
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $company = Company::where('name',$data['company'])->first();
    $department = Department::where('name',$data['department'])->first();
    $municipality = Municipality::where('name',$data['municipality'])->first();
    if (!$company) return response()->json('Empresa no encontrada',400);
    if (!$department) return response()->json('Departamento no encontrado',400);
    if (!$municipality) return response()->json('Municipio no encontrado',400);

    $offers = DB::table('offers')
    ->where('offers.trash',0)
    ->where('company',$company->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })
    ->where("service", $data["service"])
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name'
    )
    ->get();

    $offersAll =  [];
    
   foreach ($offers as $offer) {
     $highlights= DB::table('highlights')->where("offer", $offer->id)->get();

     if(!$highlights) array_push($offersAll,$offer);
     else{
        $pushArray=true;
        foreach ($highlights as $highlight) {
          if($highlight->department==$department->id
            &&$highlight->municipality==$municipality->id
            &&$highlight->highlighted_expiration>=date('Y-m-d')) $pushArray=false;  
        }

        if($pushArray) array_push($offersAll,$offer);
      }
    }

    $offers= Offer::joinFields($offersAll);
    
    
    if (!$offers) return response()->json(["errorMessage"=>'No se encontraron ofertas sin destacar'],404);
		return response()->json($offers, 200);
  }//here

  public function searchOffers(Request $request){
    $data = $request->all();
    DB::table('configs')
    ->where("id","=",'2')
    ->increment('value', 1);
    $validation = Validator::make($data, [
      'service' => ['required', 'exists:services,name'],
      'department' => ['required', 'exists:departments,name'],
      'municipality' => ['required', 'exists:municipalities,name'],
    ]);
    if(isset($data["technologies"])){
      $data["technologies"] = explode(",",$data["technologies"]);
    }
    if(isset($data["speeds"])){
      $data["speeds"] = explode(",",$data["speeds"]);
    }
    if(isset($data["providers"])){
      $data["providers"] = explode(",",$data["providers"]);
    }
    if(isset($data["plans"])){
      $data["plans"] = explode(",",$data["plans"]);
    }
    if ($validation->fails()){
      if($request->ajax()){
        return response()->json($validation->errors(), 400);
      }else {
        return back()->withErrors($validation->errors());
      }
    }
    $service = Service::where('name',$data['service'])->first();
    $department = Department::where('name',$data['department'])->first();
    $municipality = Municipality::where('name',$data['municipality'])->first();
    if (!$service) return response()->json('Servicio no encontrado',404);
    if (!$department) return response()->json('Departamento no encontrado',404);
    if (!$municipality) return response()->json('Municipio no encontrado',404);

    $query="?&department=".$data["department"]."&municipality=".$data["municipality"]."&service=".$data["service"]."&offer_type=".$data["offer_type"];

    $offers = DB::table('offers')
    ->where('offers.trash',0)
    ->where(function($query) use($data){
      $query->where("offers.type", $data["offer_type"])
      ->orWhere("offers.type", null);
    })
    ->where('service',$service->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->where(function($query) use($data){
      if(isset($data['technologies']))
      foreach ($data['technologies'] as  $k => $t) {
       if($k == 0) $query->where('offers.tecnologia',"=",$t);
        
        else $query->orWhere('offers.tecnologia',"=",$t);
      }
    })
    ->leftJoin('fields_values as fs',function($join){

        $join->on('fs.offer_id','offers.id');

      }
     )
    ->join('fields', 'fields.id', 'fs.field_id')->where("fields.name","=","Velocidad") 
    ->where(function($query) use($data){
      if(isset($data['mins'] ) && isset($data['maxs'] )){

      $query->where(\DB::raw("convert(fs.value,UNSIGNED)"),">=",$data["mins"])->where("fields.name","=",'Velocidad');
      $query->where(\DB::raw("convert(fs.value,UNSIGNED)"),"<=",$data["maxs"]);}
    })->where(function($query) use($data){
      if(isset($data['providers']))
      foreach ($data['providers'] as  $k => $t) {
       if($k == 0) $query->where('companies.id',"=","$t");
       else  $query->orWhere('companies.id',"=","$t");
      }
    })
   ->where(function($query)use($data){
      if(isset($data['plans'])){
        foreach ($data['plans'] as  $k => $t) {
         if($k == 0) $query->where('offers.tipo_plan_logos',"=","$t");
         else  $query->orWhere('offers.tipo_plan_logos',"=","$t");
        }
      }

    })
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    'fs.value as speed'
    );

    //print_r($offers->toSql());
    $providers = DB::table('companies')
    ->where('companies.trash',0)
    ->leftJoin("offers",'offers.company','=','companies.id')
    ->where('offers.trash',0)
    ->where(function($query) use($data){
      $query->where("offers.type", $data["offer_type"])
      ->orWhere("offers.type", null);
    })
    ->where('service',$service->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })
    ->select("companies.name","companies.id")->distinct();
    $providers = $providers->get();

    $technologies =  DB::table('offers')
     ->where('offers.trash',0)
     ->whereNotNull("offers.tecnologia")
    ->where(function($query) use($data){
      $query->where("offers.type", $data["offer_type"])
      ->orWhere("offers.type", null);
    })
    ->where('service',$service->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })
   
   ->groupBy("offers.tecnologia")
  ->select("offers.tecnologia as type", DB::raw('count(offers.id) as total'))
    ->distinct()->get();
    $plans = [
       (object)["name" =>"internet", "id" => 0],
       (object) ["name" => 'Internet + Telefonía', "id" => 1],
        (object) ["name" => 'internet + Telefonía + tv', "id" => 2],
           (object) ["name" => 'Voz IP', "id" => 3]
    ];

  
    $speeds =  DB::table('fields')
    ->join("fields_values", "fields.id", "=","fields_values.field_id")
    ->join("offers","fields_values.offer_id","=","offers.id")
    ->join("companies","offers.company",'=',"companies.id")
    ->where('offers.trash',0)
    ->where("fields.name",'=','Velocidad')
    ->where("fields_values.value","<>","")
     ->where(function($query) use($data){
      $query->where("offers.type", $data["offer_type"])
      ->orWhere("offers.type", null);
    })
    ->where('service',$service->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })->select(\DB::raw('min(CONVERT(fields_values.value, UNSIGNED)) as mins,max(CONVERT(fields_values.value, UNSIGNED)) as maxs'));
 $speeds = $speeds->get()[0];
    $price = DB::table("offers")
        ->where('offers.trash',0)
      ->where(function($query) use($data){
      $query->where("offers.type", $data["offer_type"])
      ->orWhere("offers.type", null);
    })
    ->where('service',$service->id)
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    });
    $max_price = $price->max("tariff");
    $min_price = $price->min("tariff");
    if (!$offers) return response()->json(["errorMessage"=>'No se encontraron ofertas disponibles'],404);

    if($request->input("from")&&is_numeric($request->input("from"))){
      $offers->where("offers.tariff", ">=", $request->input("from"));
    }

    if($request->input("to")&&is_numeric($request->input("to"))){
      $offers->where("offers.tariff", "<=", $request->input("to"));
    }

    $offers=$offers->distinct()->get();
   
    $offers=Offer::joinFields($offers->toArray());
    $fields=DB::table("fields")->where("service_id", $service->id)
    ->where("trash",0)
    ->orderBy("id", "asc")
    ->get();
    if($request->input("sortBy")){
      $sorting="sortBy";
      $sortKey=$request->input("sortBy");
      if($sortKey>2) return response()->json("No existe ese campo",400);
      if($request->input("sortByDesc")) $sorting="sortByDesc";
      $offers=collect($offers);
      $offers=$offers->{$sorting}(function ($offer, $key) use($sortKey) {
        if(is_numeric($sortKey))
          return $offer->fields_values[$sortKey-1]->value;
        return $offer->{$sortKey};
      });
    }

    $offersArray=[];

    foreach ($offers as $offer) {
      $offer->tariff = round($offer->tariff);
      array_push($offersArray,$offer);
    }
    $page=$request->input("page")?$request->input("page"):1;

    $paginator = new Paginator(array_slice($offersArray,(($page-1)*10),10), 10,$page);

    $last_page= max((int) ceil(count($offersArray) / 10), 1);
   
    if(!$request->ajax()){

      
      return view("pages.planComparator")->with(
        ["pagination"=> $paginator,
        "fields"=>$fields, "query"=>$query,
        "providers"=>$providers,
        "technologies" =>$technologies,
        "plans"=> $plans,
        "speeds" => $speeds,
        "min_price"=> $min_price,
        "max_price" => $max_price,
          "last_page"=>$last_page,
          "count" => count( $offersArray)]
      );

    }
    
    return response()->json(["pagination"=>$paginator,
     "fields"=>$fields,
      "query"=>$query, 
      "last_page"=>$last_page], 200);

  }

  public function getHighlightByLocation(Request $request){
    $data = $request->all();

    $validation = Validator::make($data, [
      'department' => ['required', 'string'],
      'municipality' => ['required', 'string'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $department = Department::where('name', 'like', "%".$data['department']."%")->first();
    $municipality = Municipality::where('name', 'like', "%".$data['municipality']."%")->first();
    if (!$department) return response()->json(["errorMessage"=>'Departamento no encontrado',"notMun"=>1],404);
    if (!$municipality) return response()->json(["errorMessage"=>'Municipio no encontrado',"notMun"=>1],404);

    $offers = DB::table('offers')
    ->where('offers.trash',0)
    ->join('highlights','highlights.offer','offers.id')
    ->where("highlights.department", $department->id)
    ->where("highlights.municipality",$municipality->id)
    ->where('highlights.highlighted_expiration','>=',date('Y-m-d h:i:s'))
    ->where(function($query) use($department){
      $query->where('departments', "like" ,'%'.$department->name.'%')
      ->orWhere("departments",null);
    })
    ->where(function($query) use($municipality){
      $query->where('municipalities', "like" ,'%'.$municipality->name.'%')
      ->orWhere("municipalities",null);
    })
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    'highlights.highlighted_expiration as highlighted_expiration'
    )->distinct()->get();

    
    
    $offers= Offer::joinFields($offers->toArray());
    
    
    if (!$offers) return response()->json(["errorMessage"=>'No se encontraron ofertas disponibles'],404);
    return response()->json($offers, 200);
  }//here

  public function HighlightOffer($id, Request $request){
    $data = $request->all();
    //var_dump($data["highlighted_expiration"]); exit();
    $validation = Validator::make($data, [
      'highlighted_expiration' => ['required', 'date',"after_or_equal:".date('Y-m-d')],
      "department" => "required|exists:departments,name",
      "municipality" => "required|exists:municipalities,name",
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $offer = Offer::find($id);
    if (!$offer) return response()->json('Oferta no encontrada',404);
    
    $department = Department::where('name',$data['department'])->first();
    $municipality = Municipality::where('name',$data['municipality'])->first();

    $data["offer"] = $offer->id;
    $data["department"] = $department->id;
    $data["municipality"] = $municipality->id;

    $highlight= Highlight::findOrCreate($data);
    
    if (!$highlight) return response()->json('Error en la base de datos',500);
    return response()->json('Oferta destacada', 200);

  }//here

  public function deleteHighlightOffer($id){
    
    $offer = Offer::find($id);
    if (!$offer) return response()->json('Oferta no encontrada',404);
    
    $highlight= Highlight::where("offer","=",$offer->id)->first();

    if(!$highlight) return response()->json("Oferta no destacada", 400);

    if (!$highlight->delete()) return response()->json('Error en la base de datos',500);
    return response()->json('Oferta puesta fuera de "destacados"', 200);

  }

  public function getAllHighlighted(){
    $offers = DB::table('offers')
    ->where('offers.trash',0)
    ->join("highlights", "highlights.offer", "offer.id")
    ->where('highlights.highlighted_expiration','>=',date('Y-m-d h:i:s'))
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    'highlights.highlighted_expiration as highlighted_expiration'
    )
    ->get();

    $offers=Offer::joinFields($offers->toArray());

		if (!$offers) return response()->json(["errorMessage"=>'No se encontraron ofertas disponibles'],404);
		return response()->json($offers, 200);
	}

	public function deleteOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Oferta no encontrada',404);
		$offer->trash = 1;
   /* $offer->highlighted = 0;
    $offer->highlighted_expiration = null;*/
		if (!$offer->save()) return response()->json('Error en la base de datos',500);
		return response()->json('Oferta eliminada satisfactoriamente', 200);
  }
}
