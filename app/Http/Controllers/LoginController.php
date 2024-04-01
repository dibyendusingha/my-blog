<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{


    public function login_page(){
        return view('login');
    }

    public function reg_page(){
        return view('reg');
    }

    public function save_reg(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|min:6',
           
        ]);
        if ($validator->fails()) {
            $output['response']=false;
            $output['message']='Validation error!';
            $output['error'] = $validator->errors();
            return $output;
            
            exit;
        }else{
      
            $admin_count = Admin::where('email',$request->email)->count();
            if($admin_count == 0){
                try{
                    DB::beginTransaction();
                    $addUser = new Admin;
                    $addUser->name            = $request->name;
                    $addUser->email           = $request->email;
                    $addUser->password        = md5($request->password);;
                    $addUser->save();
                    DB::commit();
        
                    session()->put('username',$request->name);
                    session()->put('userid',$addUser->id);

                    return response()->json(['message' => true]);
        
                    // return redirect('home')->with(['success' =>'registration successfully.']);
        
                }catch (\Exception $e) {
                    return response()->json([
                        'status' => false,
                        'with' => 'error',
                        'message' => 'Error creating . ' . $e->getMessage(),
                    ]);
                } 

            }else{
                // return redirect('/')->with(['error' =>'Please Login.Email Id Already have']);
                return response()->json(['message' => false]);
            }
        }

    }

    public function save_login(Request $request){
      //  dd($request->all());
        try{
            DB::beginTransaction();
            $pass = md5($request->password);
            $user_count = Admin::where(['email'=>$request->email , 'password' =>$pass])->count();
            //dd($user_count);
            if($user_count > 0){
                $user = Admin::where(['email'=>$request->email , 'password' =>$pass])->first();
                session()->put('username',$user->name);
                session()->put('userid',$user->id);
                return response()->json(['message' => true]);
                //return redirect('home')->with(['error' =>'Login successfully.']);
            }else{
                return response()->json(['message' => false]);
                //return redirect('/');
            }
        }catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'with' => 'error',
                'message' => 'Error creating . ' . $e->getMessage(),
            ]);
        } 
    }
}
