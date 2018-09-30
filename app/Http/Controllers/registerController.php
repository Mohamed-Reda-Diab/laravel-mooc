<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/08/2018
 * Time: 04:48 ص
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
class registerController extends Controller
{
 public function register(Request $request){

    $rule= [
         'username' => 'required|min:3|max:6',
         'password' => 'required|min:6',
         'email' => 'required|email',
        'gender' => 'required'
     ];
    $newErrorsMessage=['required'=>'missing field'];
     $validator = Validator::make($request->all(),$rule ,$newErrorsMessage);

     if ($validator->fails()) {
         return redirect()
             ->back()
             ->withErrors($validator);


     }

 }
}