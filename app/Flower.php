<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Flower extends Model
{
    public static $errors;
    protected $fillable=['nume','marime','culoare','pret'];
    public $timestamps=false;
    protected $table = 'flowers';
    public static $rules=[
        'nume'=>'required',
        'culoare'=>'required',
        'marime'=>'required',
        'pret'=>'required'
    ];
    public static function isValid($data){
        $validation=Validator::make($data,static::$rules);
        if($validation->passes()) return true;
        static::$errors=$validation->messages();
        return false;
    }

}
