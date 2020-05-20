<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use Validator;


class adminController extends Controller
{
    public function home()
    {
         return view ('admin.home');
    }
    
     public function post()
    {
        $catagory=DB::table('catagories')->get();
         $tag=DB::table('tags')->get();

        return view ('admin.posts',compact('catagory','tag'));
         
    }

    public function catagory()
    {
         return view ('admin.catagoryAction');
    }

    public function tag()
    {
         return view ('admin.tagAction');
    }

    public function createCatagory(Request $req)
    {
         
          $validatedData = $req->validate([
        'cname' => 'required|unique:catagories|max:20|min:6',
        'cslug' => 'max:20',
             ]);
         $data=array();
         $data['cname']=$req->cname;
         $data['cslug']=$req->cslug;

         $catagory=DB::table('catagories')->insert($data);

         if ($catagory)
         {
            $notification=array(
             'messege'=>'Catagory Created Successfully !',
             'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
         }
        else
        {
             $notification=array(
             'messege'=>'Catagory is not created',
             'alert-type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
        



    }


     public function createTag(Request $req)
    {
          $validatedData = $req->validate([
        'tname' => 'required|unique:tags|max:20|min:6',
        'tslug' => 'max:20',
    ]);

         
         $data=array();
         $data['tname']=$req->tname;
         $data['tslug']=$req->tslug;

         $tag=DB::table('tags')->insert($data);

         if ($tag)
         {
            $notification=array(
             'message'=>'Tag Created Successfully !',
             'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);
         }
        else
        {
             $notification=array(
             'message'=>'Tag is not created !',
             'alert-type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
        

    }


public function allTag()
    {
        $tag=DB::table('tags')->get();
        return view ('admin.allTag',compact('tag'));

    }

    public function allCatagory()
    {
        $catagory=DB::table('catagories')->get();
        return view ('admin.allCatagory',compact('catagory'));

    }




    public function viewCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->first();
        return view ('admin.viewCatagory',compact('catagory'));

    }

    public function viewTag($tid)
    {
        $tag=DB::table('tags')->where('tid',$tid)->first();
        return view ('admin.viewTag',compact('tag'));

    }
    public function deleteCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->delete();
        return Redirect()->back();
    }
    

public function editCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->first();
        return view ('admin.updateCatagory',compact('catagory'));

    }
    public function editTag($tid)
    {
        $tag=DB::table('tags')->where('tid',$tid)->first();
        return view ('admin.updateTag',compact('tag'));

    }

     public function updateCatagory(Request $req,$cid)
    {
             $validatedData = $req->validate([
        'cname' => 'required|max:20|min:6',
        'cslug' => 'max:20',
             ]);
         $data=array();
         $data['cname']=$req->cname;
         $data['cslug']=$req->cslug;

         $catagory=DB::table('catagories')->where('cid',$cid)->update($data); 

         return Redirect('all/catagory');     
    }


      public function updateTag(Request $req,$tid)
    {
             $validatedData = $req->validate([
        'tname' => 'required|max:20|min:6',
        'tslug' => 'max:20',
             ]);
         $data=array();
         $data['tname']=$req->tname;
         $data['tslug']=$req->tslug;

         $tag=DB::table('tags')->where('tid',$tid)->update($data); 

         return Redirect('all/tag');     
    }


  public function writePost(Request $req)
    {
             $validatedData = $req->validate([
        'pname' => 'required|max:25|min:6',
        'cname' => 'required|max:20|min:6',
        'tname' => 'required|max:20|min:6',
        'image' => 'required|mimes:jpeg,jpg,png',
        'description' => 'required',
             ]);
         $data=array();
         $data['uid']= 1;
         $data['pname']=$req->pname;
         $data['cname']=$req->cname;
         $data['tname']=$req->tname;
         
         $data['description']=$req->description;
         $image=$req->file('image');

         if ($image)
         {
           $imageName= Str::random(5);     
                $ext=strtolower($image->getClientOriginalExtension());
                $imageFullName=$imageName.'.'.$ext;
                $uploadPath='public/design/image/';
                $imageUrl=$uploadPath.$imageFullName;
                $success=$image->move($uploadPath,$imageFullName);
                $data['image']=$imageUrl;
                DB::table('posts')->insert($data);
                 return Redirect()->back();
               
         }
        else
            {
               DB::table('posts')->insert($data);
                return Redirect()->back();
            }

        

         }  

    public function allPost()
    {
        $allPost=DB::table('posts')->get();
        return view ('admin.allPost',compact('allPost'));

    }
 
    }

    




