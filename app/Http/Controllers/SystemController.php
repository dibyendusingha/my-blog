<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class SystemController extends Controller
{
    public function first_page(){
        $blog = Form::with('user')->where('status',1)->get();
        $blog_count = $blog->count();
        // dd($blog);
        return view('user.index',['blog' => $blog , 'blog_count' => $blog_count]);
    }

    public function blog_page($id){
       // dd($id);
        $blog_details = Form::with('user')->where('id',$id)->where('status',1)->first();

        return view('user.blog_details',['blog_details' => $blog_details ]);
    }
}
