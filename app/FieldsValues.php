<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldsValues extends Model
{
    protected $fillable=[
        "offer_id",
        "field_id",
        "value",
        "trash",
    ];

    public static function storeValues($value,$offer_id){
            
        
            $value->offer_id=$offer_id;
        
            $field_value=FieldsValues::where("field_id", $value->field_id)
            ->where("offer_id", $value->offer_id)->first();

            if(!$field_value)  FieldsValues::create((array) $value);

            else {
                $field_value->value=$value->value;
                $field_value->save();
            }

    }

}
