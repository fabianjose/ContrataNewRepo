<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable= [
        "highlighted_expiration",
        "department",
        "municipality",
        "offer"
    ];

    public static function findOrCreate($data){

        $highlight= Self::where("offer", "=", $data["offer"])
        ->where("department", "=", $data["department"])
        ->where("municipality", "=", $data["municipality"])
        ->first();

        if(!$highlight){

            $highlight= Self::create($data);

            return $highlight;

        }

        else{
            $highlight->highlighted_expiration= $data["highlighted_expiration"];

            if(!$highlight->save()) return false;

            else return $highlight;
        }

    }
}
