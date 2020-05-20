<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use Validator;

class administrativeController extends Controller
{
    public function allCatagory()
    {
        $catagory=DB::table('catagories')->get();
        return view ('administrative.allCatagory',compact('catagory'));

    }

     public function catagory()
    {
         return view ('administrative.catagoryAction');
    }
    public function tag()
    {
         return view ('administrative.tagAction');
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

    public function editCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->first();
        return view ('administrative.updateCatagory',compact('catagory'));

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

     public function viewCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->first();
        return view ('administrative.viewCatagory',compact('catagory'));

    }

     public function deleteCatagory($cid)
    {
        $catagory=DB::table('catagories')->where('cid',$cid)->delete();
        return Redirect()->back();
    }
    public function viewTag($tid)
    {
        $tag=DB::table('tags')->where('tid',$tid)->first();
        return view ('administrative.viewTag',compact('tag'));

    }
    public function editTag($tid)
    {
        $tag=DB::table('tags')->where('tid',$tid)->first();
        return view ('administrative.updateTag',compact('tag'));

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

}
