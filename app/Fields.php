<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    protected $fillable=[
        "name",
        "type",
        "unit",
        "service_id",
        "trash",
    ];

    public static function storeData($service_id,$data){

        if($data->field_id){
            $field=Fields::find($data->field_id);
            if(!$field) return false;
            $field->name=$data->name;
            $field->type=$data->type;
            $field->unit=$data->unit;
            if(!$field->save()) return false;
            return $field;
        }

        $data->service_id=$service_id;

        return Fields::create((array) $data);
    }
}
