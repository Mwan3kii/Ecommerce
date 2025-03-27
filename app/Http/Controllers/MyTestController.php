<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Models\test;


class MyTestController extends Controller
{
    //
  
    public function Myindex(){
        $td= date("Y/m/d");
        $number=rand();
         return "Hello Iam a wonderful controller ".$td.'SOME HTML <br>'.$number;
     
    }



    public function MyCoolFunction(){
        
            //$allUsers = User::find('id',$f)->get();
           $allUsers = User::all();
           $variable2=' USERS LIST';
           $variable3='DATE'.date('m/y/d');
        return view('myview',compact('allUsers','variable2','variable3'));
    }


    public function testusersFx(){
        $allUsers = Test::all();
        // $allUsers = Test::where('email','jane.smith@example.com')->get();
        $allUsers = Test::where('id','>',5)->get();
        $variable2="HEADINF";
        $variable3='DATE'.date('m/y/d');
     return view('myview',compact('allUsers','variable2','variable3'));
 
    }

    
}
