<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class admincontroller extends Controller
{
    # Add Page Show
    public function blog_page(){
        return view('admin.blog');
    }

    #Read Article
    public function index_page(){ 
        $user_id = session()->get('userid');
        $blog_details = Form::whereIn('status',[1,2])->where('user_id',$user_id)->get();
        return view('admin.index',['blog_details'=>$blog_details]);
    }

    # Add Article
    public function add_article(Request $request){
       // dd($request->all());

        $user_id = session()->get('userid');
        //dd($user_id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=> 'required|integer'
        ]);

        $profile_img = $request->image; 
        if ($profile_img) {
            $rand = rand(10000,99999);
            $imageName = time(). '_img_'.$rand.'.' . $profile_img->extension();
            $profile_img->move(public_path('images/post'), $imageName);
            $relativePath = 'images/post/' . $imageName;
        }else{
            $relativePath = null; 
        }

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']='Validation error!';
            $output['error'] = $validator->errors();
            return $output;
            exit;
        }else{

            try{
                DB::beginTransaction();
                $addArticle = new Form;
                $addArticle->user_id         = $user_id;
                $addArticle->name            = $request->name;
                $addArticle->description     = $request->description;
                $addArticle->status          = $request->status;
                $addArticle->image           = $relativePath;

                $addArticle->save();
                DB::commit();
    
                return redirect('home')->with(['success' =>'created successfully.']);
    
            }catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'with' => 'error',
                    'message' => 'Error creating . ' . $e->getMessage(),
                ]);
            } 

        }
    }

    # Edit Article
    public function edit_article($id){
        $user_id = session()->get('userid');
        $edit_article = Form::where('id',$id)->where('user_id',$user_id)->first();
        return view('admin.edit',['edit_article'=>$edit_article]);
    }

    # Delete Article
    public function delete_article($id){
       // dd($id);
        $user_id = session()->get('userid');
        $article_details = Form::where('id',$id)->where('user_id',$user_id)->first();
        $article_details->status   = 0;
        $article_details->update();

        return redirect('home')->with(['success' =>'Deleted Successfully']);
    }

    # Update Article
    public function update_article(Request $request,$id){
        $user_id = session()->get('userid');
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
          //  'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=> 'required|integer'
        ]);
        //dd($request->all());

        $img_det = Form::where('id',$id)->where('user_id',$user_id)->first();
        $old_img = $img_det->image;
       // dd($old_img);
        $profile_img = $request->edit_image;
        if (!empty($request->edit_image)) {
            $oldImagePath = $img_det->image;
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                // unlink(public_path($oldImagePath));
                $old_image = public_path($oldImagePath);
                File::delete($old_image);
                // Storage::delete($oldImagePath);
            }
         
            $rand = rand(10000,99999);
            $imageName = time(). '_img_'.$rand.'.' . $profile_img->extension();
            $profile_img->move(public_path('images/post'), $imageName);
            $relativePath = 'images/post/' . $imageName;
        }
        else if(empty($request->image)){
            $relativePath = $old_img; 
        }

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']='Validation error!';
            $output['error'] = $validator->errors();
            return $output;
            exit;
        }else{

            try{
                DB::beginTransaction();
                $editArticle = Form::where('id',$id)->first();
                $editArticle->name            = $request->name;
                $editArticle->description     = $request->description;
                $editArticle->status          = $request->status;
                $editArticle->image           = $relativePath;

                $editArticle->update();
                DB::commit();
    
                return redirect('home')->with(['success' =>'update successfully.']);
    
            }catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'with' => 'error',
                    'message' => 'Error creating . ' . $e->getMessage(),
                ]);
            } 
        }
    }

}





