<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class SystemController extends Controller
{
    public function first_page(){
        $blog = Form::with('user')->where('status',1)->paginate(25);
        // dd($blog);
        return view('welcome',['blog' => $blog]);
    }
}
