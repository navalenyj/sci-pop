<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PandemicController extends Controller
{
   public function index(){
       return view('pandemic.index');
   }
}
