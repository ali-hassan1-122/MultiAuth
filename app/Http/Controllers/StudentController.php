<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
		 public function __construct() {
   		 $this->middleware(['auth','verified','student']);
 	 }
     public function index(){
    	return view('student.index');
    }
}
